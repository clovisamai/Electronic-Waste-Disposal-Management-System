<?php
 	include('database-config.php');
	$electron = $_POST['selectElec'];
	$qty = $_POST['quantity'];

	$sql = ("SELECT * FROM inventory WHERE elecid = '$electron'");
	$result = mysqli_query($conn,$sql);
	$count = mysqli_num_rows($result);

	if ($count == 1) {
		$row = mysqli_fetch_array($result);
		$old = $row['qty_in'];
		$new = $old + $qty;

		$qry =("UPDATE `inventory` SET `qty_in` = '$new' WHERE elecid = '$electron'");
		if (mysqli_query($conn, $qry)) {
			header('Location: ../pages/inventory.php?msg=1');
		}else{
			header('Location: ../pages/inventory.php?msg=2');
		}
	}
	elseif($count == 0)
	{
		$qry =("INSERT INTO `inventory` (`elecid`, `qty_in`) VALUES ('$electron', '$qty')");
		if (mysqli_query($conn, $qry)) {
			header('Location: ../pages/inventory.php?msg=1');
		}else{
			header('Location: ../pages/inventory.php?msg=2');
		}
	}	
	mysqli_close($conn);
?>