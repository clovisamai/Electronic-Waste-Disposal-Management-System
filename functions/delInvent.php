<?php
require 'database-config.php';
$id = $_POST['selectElec'];
$qty = $_POST['quantity'];

$sql = ("SELECT * FROM inventory WHERE elecid = '$id'");
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

$old = $row['qty_in'];
$new = $old - $qty;

if ($qty > $old) {
	header('Location: ../pages/inventory.php?msg=7');
}
elseif($qty < $old){	
	$sql = ("UPDATE `inventory` SET `qty_in` = '$new' WHERE elecid = '$id'");

	if (mysqli_query($conn, $sql)) {
		header('Location: ../pages/inventory.php?msg=1');
	} else {
		header('Location: ../pages/inventory.php?msg=2');
	}
}

mysqli_close($conn);
?>