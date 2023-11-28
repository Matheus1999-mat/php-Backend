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
    <style>
        /* estilo_body */
        body {
            font-family: Arial, sans-serif;
            background-color: lightblue;
            margin: 0;
            padding: 0;
        }

        /* estilo_container */
        .container {
            max-width: 1350px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
            border-radius: 3%;
        }

        /* estilo_alertas */
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* estilo_formulario */
        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border-radius: 15px;
            border: 1px solid #ccc;
            transition: border-color 0.3s ease-in-out;
        }

        .form-control:focus {
            outline: none;
            border-color: #5f9ea0;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-success {
            background-color: #4682b4;
            color: #fff;
            border: none;
        }

        .btn-danger {
            background-color: #cd5c5c;
            color: #fff;
            border: none;
        }

        /* estilo_tabela */
        .table {
            width: 100%;
            border-collapse: collapse;
            background-color: rgba(0, 0, 0, 0.1);
        }

        .table th,
        .table td {
            padding: 15px;
            text-align: left;
            border: 3px solid black;
        }

        /* estilo_edição_e_exclusão */
        .edit-btn,
        .delete-btn {
            padding: 6%;
            margin-top: 5px;
            color: #fff;
            border-radius: 20px;
            text-decoration: none;
            transition: opacity 0.3s ease-in-out;
        }

        .edit-btn {
            background-color: #008080;
        }

        .delete-btn {
            background-color: #8b0000;
        }

        .edit-btn:hover,
        .delete-btn:hover {
            opacity: 0.8;
        }

        /* estilo_botões*/
        .btn-success-custom,
        .reset-btn,
        .back-to-login-btn {
            display: block;
            width: 100%;
            padding: 12px;
            margin-bottom: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            transition: opacity 0.3s ease-in-out;
        }

        .btn-success-custom {
            background-color: #6b8e23;
            color: #fff;
        }

        .reset-btn {
            background-color: #b22222;
            color: #fff;
        }

        .back-to-login-btn {
            background-color: #1e90ff;
            color: #fff;
            border-radius: 50px;
        }

        /* efeito_hover*/
        .btn-success-custom:hover,
        .reset-btn:hover,
        .back-to-login-btn:hover {
            opacity: 0.6;
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
                            <input type="text" name="fullName" id="fullName" placeholder="Full Name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" id="phone" placeholder="Phone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="email" placeholder="Email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="address" id="address" placeholder="Address" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="relation" id="relation" placeholder="Relation" class="form-control" required>
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
                                <td style="padding-right: 0; width: 130px;"><?php echo $row['phone'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['address'] ?></td>
                                <td><?php echo $row['relation'] ?></td>
                                <td><?php echo $row['created_at'] ?></td>
                                <td>
                                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-info-custom edit-btn">
                                        <i class="fas fa-marker"></i>
                                    </a>
                                    <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger-custom delete-btn">
                                        <i class="fas fa-trash-alt"></i>
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