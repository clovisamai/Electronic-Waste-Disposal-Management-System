<?php
 	include('database-config.php');
 	session_start();
 	include('../sess.php');

	$e_id = $_POST['selectElec'];
	$dept = $_POST['selectDept'];
	$code = $_POST['serial'];
	$issue = $_POST['selectIssue'];	

	$sql = ("SELECT * FROM `reported` WHERE dept = '$dept' AND code = '$code' AND elecid = '$e_id'");

	$result = mysqli_query($conn,$sql);
	$count = mysqli_num_rows($result);

	if ($count == 1) {
		header('Location: ../pages/index.php?msg=9');
	}
	elseif($count == 0)
	{
		$electronic = ("SELECT * FROM `commissioned` WHERE elecid='$e_id' AND dept='$dept'");
		$res = mysqli_query($conn,$electronic);
		$row = mysqli_fetch_array($res);
		$el_qty = $row['qty'];	
		
		if($el_qty == 0){
			header('Location: ../pages/index.php?msg=10');
		}
		elseif ($el_qty >= 1) {
				$qry =("INSERT INTO `reported` (`userid`, `dept`, `elecid`, `issue`, `code`, `status`) VALUES ('$ID','$dept', '$e_id', '$issue', '$code', 'pending')");

				if (mysqli_query($conn, $qry)) {
					header('Location: ../pages/index.php?msg=1');
				}else{
					header('Location: ../pages/index.php?msg=2');
				}
		}
	}	
	mysqli_close($conn);
?>