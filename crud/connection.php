<?php

if (!isset($_SESSION)) {
    session_start();
}

$servidor = "localhost";
$usuario = "root";
$senha = "";
$bd = "contacts";
$conn = mysqli_connect($servidor, $usuario, $senha, $bd);

?>