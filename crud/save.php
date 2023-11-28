<?php

require_once 'connection.php';

$fullName = $_POST['fullName'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];
$relation = $_POST['relation'];

$sqlInsert = "INSERT INTO `contacts`( `fullName`, `phone`,`email`,`address`,`relation`) VALUES ('$fullName','$phone','$email','$address','$relation')";

$result = mysqli_query($conn, $sqlInsert);

if (!$result) {
    echo 'Query did not work. Try again!';
}

$_SESSION['message'] = 'Contact saved successfully!';
$_SESSION['message_type'] = 'success';

header('Location: index.php');

?>