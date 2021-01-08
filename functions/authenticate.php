<?php	
	require 'database-config.php';
	session_start();

	//Pick username and password from form
	$username = mysqli_real_escape_string($conn,$_POST['username']);
	$password = mysqli_real_escape_string($conn,$_POST['password']); 

	//Search database for march of username and password
	$sql = ("SELECT * FROM users WHERE username = '$username' and password = '$password'");
    $result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$count = mysqli_num_rows($result);

	if($count == 1) {
		
		session_regenerate_id();
		$_SESSION['sess_user_id'] = $row['userid'];
		$_SESSION['sess_username'] = $row['username'];
        $_SESSION['sess_first_name'] = $row['fname'];
        $_SESSION['sess_last_name'] = $row['lname'];
        $_SESSION['sess_contact'] = $row['contact'];
        $_SESSION['sess_email'] = $row['email'];
        $_SESSION['sess_userrole'] = $row['AccType'];   
		session_write_close();

		header('Location: ../pages/index.php');
	}
	else{
		header('Location: ../index.php?msg=3');
	}
?>