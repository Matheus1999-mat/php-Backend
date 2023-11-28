<?php
require_once 'connection.php';
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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #2c3e50, #3498db);
        }

        main {
            display: flex;
            align-items: center;
            height: 100vh;
        }

        .card {
            border: none;
            border-radius: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.9);
        }

        .card-header {
            /* background-color: #6c757d; */
            /* color: #fff; */
            border-radius: 10px 10px 0 0;
            font-size: 18px;
        }

        .form-group {
            margin-bottom: 20px;
        }
        .form-control {
            border-radius: 10px;
        }

        .btn-success-custom {
            background-color: lightgreen;
            color: black;
            width: 150px;
            border-radius: 15px 15px 0 0;

        }

        .btn-danger-custom {
            background-color: lightcoral;
            color: black;
            width: 150px;
            border-radius: 0 0 15px 15px;
        }

        a {
            color: #fff;
        }
    </style>
    <title>Login</title>
</head>

<body>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mx-auto mt-5">
                    <div class="card">
                        <div class="card-header text-center">
                            Please insert your data in order to use this system.
                        </div>
                        <div class="card-body">
                            <form action="save-login.php" method="POST">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" placeholder="email@email.com" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" placeholder="**********" class="form-control">
                                </div>
                                <div class="form-group d-flex justify-content-between align-items-center">
                                    <input type="submit" name="save" value="Save" class="btn btn-success btn-md btn-success-custom" id="custom-button">
                                    <a href="login.php" class="btn btn-danger btn-md btn-danger-custom" id="custom-back-button">Back</a>
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