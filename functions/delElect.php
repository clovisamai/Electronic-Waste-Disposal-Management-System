<?php
require 'database-config.php';
$id = $_POST['selectElec'];

$sql = ("DELETE FROM electronics WHERE elecid = '$id'");

if (mysqli_query($conn, $sql)) {
    header('Location: ../pages/electronics.php?msg=1');
} else {
   	header('Location: ../pages/electronics.php?msg=2');
}

mysqli_close($conn);
?>