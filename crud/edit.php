<?php
require_once 'connection.php';
require_once "includes/header.php";

?>

<?php
require_once 'connection.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM `contacts` WHERE `id`='$id'";
    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($result);
    $fullName = $row['fullName'];
    $phone = $row['phone'];
    $email = $row['email'];
    $address = $row['address'];
    $relation = $row['relation'];
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $fullName = $_POST['fullName'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $relation = $_POST['relation'];

    $sqlUpdate = "UPDATE `contacts` SET `fullName`='$fullName',`phone`='$phone',`email`='$email',`address`='$address',`relation`='$relation' WHERE `id`='$id'";

    $_SESSION['message'] = 'Contact updated successfully!';
    $_SESSION['message_type'] = 'primary';
    $result = mysqli_query($conn, $sqlUpdate);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* estilos_página */
        body {
            height: 100vh;
            margin: 0;
            padding: 0;
            color: #fff;
            background: linear-gradient(to right, #2c3e50, #3498db);
        }

        /* estilos_formulário */
        .card {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.2);
        }

        .form-control {
            margin-bottom: 15px;
            border-radius: 5px;
            border: none;
            padding: 10px;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
            padding: 10px 20px;
            border-radius: 0 0 20px 20px;
            color: #fff;
            cursor: pointer;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .text-center {
            text-align: center;
            margin-top: 15px;
            background-color: whitesmoke;
            padding: 15px;
        }

        a {
            color: black;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mx-auto">
                    <div class="card card-body">
                        <form action="edit.php?id=<?= $row['id'] ?>" method="POST">
                            <div class="form-group">
                                <input type="text" name="fullName" value="<?php echo $fullName; ?>" placeholder="fullName" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" value="<?php echo $phone; ?>" placeholder="phone" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" value="<?php echo $email; ?>" placeholder="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" name="address" value="<?php echo $address; ?>" placeholder="address" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" name="relation" value="<?php echo $relation; ?>" placeholder="relation" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="update" value="update" class="btn btn-success btn-block">
                            </div>
                            <div class="text-center">
                                <a href="login.php">Back to Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
    require_once "includes/footer.php";
    ?>
</body>

</html>