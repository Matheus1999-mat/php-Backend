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

<main>
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="edit.php?id=<?= $row['id'] ?>" method="POST">
                        <div class="form-group">
                            <input type="text" name="fullName" id="fullName" placeholder="fullName" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" id="phone" placeholder="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="email" placeholder="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="address" id="address" placeholder="address" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="relation" id="relation" placeholder="relation" class="form-control">
                        </div>
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


    <?php
    require_once "includes/footer.php";
    ?>