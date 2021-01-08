<?php
	include('database-config.php');
	session_start();
	include('../sess.php');

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$tact = $_POST['contact'];

	$username = $_POST['username'];
	$password = $_POST['password'];
	$cpassword = $_POST['conpassword'];


	if ($password == $cpassword) {
		$sql = ("SELECT * FROM users WHERE username = '$username'");
		$result = mysqli_query($conn,$sql);
		$count = mysqli_num_rows($result);
		$row = mysqli_fetch_array($result);
		
		if ($count >= 1) {
			header('Location: ../pages/useracc.php?msg=5');
		}
		elseif ($count == 0) {
			$qry =("UPDATE `users` SET `fname` ='$fname' ,`lname` ='$lname' ,`email` ='$email' ,`contact` ='$tact' ,`username` = '$username', `password` ='$password' WHERE userid ='$ID'");
			if (mysqli_query($conn, $qry)) {
				header('Location: ../pages/useracc.php?msg=1');
			}else{
				header('Location: ../pages/useracc.php?msg=2');
			}
		}		
	}
	elseif($password != $cpassword){
		header('Location: ../pages/useracc.php?msg=6');
	}
	mysqli_close($conn);
?>