<?php
 	include('database-config.php');
	$electron = $_POST['name'];
	$descript = $_POST['description'];

	$sql = ("SELECT * FROM electronics WHERE name = '$electron'");
	$result = mysqli_query($conn,$sql);
	$count = mysqli_num_rows($result);

	echo $count;
	if ($count >= 1) {
		header('Location: ../pages/electronics.php?msg=5');
	}
	elseif($count == 0)
	{
		$qry =("INSERT INTO `electronics` (`name`, `description`) VALUES ('$electron','$descript')");
		if (mysqli_query($conn, $qry)) {
			header('Location: ../pages/electronics.php?msg=1');
		}else{
			header('Location: ../pages/electronics.php?msg=2');
		}
		
	}	
	mysqli_close($conn);
?>