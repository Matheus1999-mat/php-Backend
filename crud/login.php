<?php
require_once 'connection.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM `user` WHERE `email`='$email'";
    $result = mysqli_query($conn, $query);
    $userData = mysqli_fetch_assoc($result);

    $correctPassword = password_verify($password, $userData['password'] ?? '');
    if ($correctPassword) {
        $_SESSION['message'] = 'Welcome!';
        $_SESSION['message_type'] = 'success';
        $_SESSION['logged'] = true;
        header("Location: index.php");
    } else {
        $_SESSION['message'] = 'Failure in login';
        $_SESSION['message_type'] = 'danger';
        header("Location: login.php?success=0");
    }
}
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
            display: flex;
            align-items: center;
            height: 100vh;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #dc3545;
            color: #fff;
            border-radius: 10px 10px 0 0;
            font-size: 18px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        #login-button {
            background-color: #28a745; /* Alterado para cinza */
        }

        #register-button,
        #how-to-button {
            background-color: #dc3545; /* Alterado para vermelho */
            color: #fff; /* Cor da letra branca */
        }

        a {
            color: #007bff;
        }

        .card-header { 
            background-color: #6c757d;
        }
    </style>
    <title>Login - Contact Book</title>
</head>

<body>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mx-auto mt-5">
                    <div class="card">
                        <div class="card-header text-center">
                            Login - Contact Book
                        </div>
                        <div class="card-body">
                            <form action="login.php" method="POST">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" placeholder="email@email.com" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" placeholder="**********" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="login" value="Login" class="btn btn-success btn-block" id="login-button">
                                </div>
                                <div class="text-center">
                                    <div class="btn-group">
                                        <a href="register.php">
                                            <button type="button" class="btn btn-secondary" id="register-button">Register</button>
                                        </a>
                                        <a href="instructions.html">
                                            <button type="button" class="btn btn-secondary ml-2" id="how-to-button">How to use this system</button>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
