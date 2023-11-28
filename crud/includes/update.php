<?php

require_once 'connection.php';

$id = $_GET['id'];
$sqlUpdate = "UPDATE `contacts` SET `id`='[value-1]',`fullName`='[value-2]',`phone`='[value-3]',
`email`='[value-4]',`address`='[value-5]',`relation`='[value-6]',`created_at`='[value-7]' WHERE";                
                     
$result = mysqli_query($conn, $sqlUpdate);

header("Location: index.php");

?>