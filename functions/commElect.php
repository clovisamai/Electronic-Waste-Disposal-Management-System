<?php
 	include('database-config.php');
	$id = $_POST['selectElec'];
	$dept = $_POST['selectDept'];
	$qty = $_POST['quantity'];

	$sql = ("SELECT * FROM inventory WHERE elecid = '$id'");
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);

	$old = $row['qty_in'];
	$new = $old - $qty;

	if ($qty > $old) {
		header('Location: ../pages/assignElect.php?msg=7');
	}
	
	elseif($qty < $old){	
		$sql = ("UPDATE `inventory` SET `qty_in` = '$new' WHERE elecid = '$id'");

		if (mysqli_query($conn, $sql)) {
			
			$sqlCom = ("SELECT * FROM commissioned WHERE elecid = '$id' AND dept ='$dept'");
			$resultCom = mysqli_query($conn,$sqlCom);
			$count = mysqli_num_rows($resultCom);

			if($count == 0) {
				$qry=("INSERT INTO `commissioned` (`commid`, `elecid`, `dept`, `qty`) VALUES (NULL,'$id','$dept', '$qty')");
				if (mysqli_query($conn, $qry)) {
					header('Location: ../pages/assignElect.php?msg=1');
				}else{
					header('Location: ../pages/assignElect.php?msg=8');
				}
			}
			elseif($count == 1){
				$rowCom = mysqli_fetch_array($resultCom);
				$oldCom = $rowCom['qty'];
				$newCom = $oldCom + $qty;

				$qry =("UPDATE `commissioned` SET `qty` = '$newCom' WHERE elecid = '$id'");
				if (mysqli_query($conn, $qry)) {
					header('Location: ../pages/assignElect.php?msg=1');
				}else{
					header('Location: ../pages/assignElect.php?msg=8');
				}
			}
		} 
		else {
			header('Location: ../pages/assignElect.php?msg=2');
		}
	}
	
	mysqli_close($conn);
?>