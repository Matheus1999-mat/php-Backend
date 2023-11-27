<?php
require_once 'connection.php';

if (!array_key_exists('logged', $_SESSION)) {
    header('Location: login.php');
    return;
}

require_once "includes/header.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }

        main {
            padding: 20px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            border-radius: 10px 10px 0 0;
            font-size: 18px;
            padding: 10px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
            border-radius: px;
        }

        .btn-success-custom,
        .btn-info-custom,
        .btn-danger-custom,
        .back-to-login-btn {
            color: #fff;
            width: 100%;
            margin-bottom: 5px;
        }

        .btn-success-custom,
        .reset-btn,
        .back-to-login-btn {
            background-color: #28a745;
            /* Cor do botão Save e Back to Login */
        }

        .btn-danger-custom,
        .delete-btn {
            background-color: #dc3545;
            /* Cor do botão Delete */
        }

        .reset-btn,
        .edit-btn {
            background-color: #6c757d;
            /* Cor do botão Reset e Edit */
        }

        .table th,
        .table td {
            text-align: center;
        }

        .edit-btn,
        .delete-btn,
        .reset-btn,
        .back-to-login-btn {
            width: 100%;
        }
        
        .back-to-login {
            color: #007bff;
            text-align: center;
            display: block;
            margin-top: 10px;
        }
    </style>
    <title>Contact Book</title>
</head>

<body>
    <main class="container p-4">
        <?php if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION["message_type"] ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php unset($_SESSION['message']); ?>
        <?php } ?>

        <div class="row">
            <div class="col-md-4">
                <div class="card card-body">
                    <form action="save.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="fullName" id="fullName" placeholder="Full Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" id="phone" placeholder="Phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="email" placeholder="Email" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="address" id="address" placeholder="Address" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="relation" id="relation" placeholder="Relation" class="form-control">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <input type="submit" value="Save" class="btn btn-success-custom">
                                </div>
                                <div class="col">
                                    <input type="reset" value="Reset" class="btn btn-success-custom reset-btn">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <a href="login.php" class="btn btn-danger-custom back-to-login-btn">
                                Back to Login
                            </a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Relation</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM `contacts`";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php echo $row['fullName'] ?></td>
                                <td><?php echo $row['phone'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['address'] ?></td>
                                <td><?php echo $row['relation'] ?></td>
                                <td><?php echo $row['created_at'] ?></td>
                                <td>
                                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-info-custom edit-btn">
                                        <i class="fas fa-marker"></i> Edit
                                    </a>
                                    <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger-custom delete-btn">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <?php
    require_once "includes/footer.php";
    ?>
</body>

</html>
