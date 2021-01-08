<?php
require 'database-config.php';

$username = $_POST['username'];


$sql = ("DELETE FROM users WHERE username ='$username'");

if (mysqli_query($conn, $sql)) {
    header('Location: ../pages/users.php?msg=1');
} else {
    header('Location: ../pages/users.php?msg=2');
}

mysqli_close($conn);
?>