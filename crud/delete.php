<?php

require_once 'connection.php';

$id = $_GET['id'];
$sqlDelete = "DELETE FROM contacts WHERE id = $id";
$result = mysqli_query($conn, $sqlDelete);
$_SESSION['message'] = 'Contact deleted successfully!';
$_SESSION['message_type'] = 'danger';

header("Location: index.php");

?>