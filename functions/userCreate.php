<?php
	include('database-config.php');

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$tact = $_POST['contact'];

	$role =  $_POST['role'];
	$username = $_POST['username'];

		$sql = ("SELECT * FROM users WHERE username = '$username'");
		$result = mysqli_query($conn,$sql);
		$count = mysqli_num_rows($result);
		$row = mysqli_fetch_array($result);
		
		if ($count >= 1) {
			header('Location: ../pages/users.php?msg=5');
		}
		elseif ($count == 0) {
			
			$qry =("INSERT INTO `users` ( `username`, `password`, `fname`, `lname`, `contact`, `email`, `AccType`) VALUES ('$username', '$fname', '$fname', '$lname', '$tact', '$email', '$role')");

			if (mysqli_query($conn, $qry)) {
				header('Location: ../pages/users.php?msg=1');
			}else{
				header('Location: ../pages/users.php?msg=2');
			}
		}	

	mysqli_close($conn);
?>