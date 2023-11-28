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
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #2c3e50, #3498db);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            
        }

        .container {
            max-width: 400px;
            padding: 40px;
            background-color: #fff;
            border-radius: 25px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.6);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .form-group {
            margin-bottom: 35px;
            margin-top: 35px;
        }

        .form-control {
            width: 100%;
            padding: 15px;
            border-radius: 10px;
            border: none;
            background-color: #f5f6fa;
            transition: background-color 0.3s ease-in-out;
        }

        .form-control:focus {
            outline: none;
            background-color: #e2e6ea;
        }

        .email-input {
            margin-bottom: -25px;
        }

        .senha-input {
            margin-top: -25px;
        }

        .btn {
            width: 100%;
            padding: 15px;
            border-radius: 10px;
            border: none;
            background-color: #3498db;
            color: #fff;
            transition: background-color 0.3s ease-in-out;
        }

        .btn:hover {
            background-color: #87CEFA;
        }

        .btn-secondary {
            width: 100%;
            padding: 15px;
            border-radius: 30px 0 30px 0;
            border: 1px solid #3498db;
            background-color: transparent;
            color: #3498db;
            transition: color 0.3s ease-in-out, border-color 0.3s ease-in-out;
        }

        .btn-secondary:hover {
            color: white;
            border-color: #2980b9;
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
                                    <input type="email" name="email" id="email" placeholder="email@email.com" class="form-control email-input">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" placeholder="**********" class="form-control senha-input">
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