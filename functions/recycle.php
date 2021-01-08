<?php
 	include('database-config.php');
	$dec = $_POST['exe'];
	
	$sql = ("UPDATE `reported` SET `status` = 'recycled' WHERE rid = '$dec'");
	if (mysqli_query($conn, $sql)) {
		$electronic = ("SELECT elecid FROM `reported` WHERE rid = '$dec'");
		$row = mysqli_fetch_array( mysqli_query($conn,$electronic));
		$e_id = $row['elecid'];

		$comm = ("SELECT * FROM reported r JOIN commissioned c WHERE rid = '$dec' AND c.elecid = r.elecid AND c.dept = r.dept");
		
		$reso = mysqli_query($conn,$comm);
		$row = mysqli_fetch_array($reso);
		
		$c_qty = $row['qty'];
		$new_c_qty = $c_qty - 1;

		if(mysqli_query($conn,$comm)){
			$comm_new = ("UPDATE commissioned c, reported r SET c.qty = '$new_c_qty' WHERE r.rid = '$dec' AND c.elecid = r.elecid AND c.dept = r.dept");
			if(mysqli_query($conn,$comm_new)){
				$checkres = mysqli_query($conn,"SELECT * FROM recycled WHERE elecid = '$e_id'");
				$count = mysqli_num_rows($checkres);

				if($count == 0){
					$recycle = ("INSERT INTO recycled( `recycleid`, `elecid`,`qty`) VALUES(NULL,'$e_id','1')");
					if(mysqli_query($conn,$recycle)){
						header('Location: ../pages/issues.php?msg=1');
					}
					else{
						header('Location: ../pages/issues.php?msg=2');
					}
				}else if($count == 1){
					$row = mysqli_fetch_array($checkres,MYSQLI_ASSOC);
					$oldres = $row['qty'];
					$newres = $oldres + 1;

					$recycle = ("UPDATE recycled SET qty = '$newres' WHERE 'elecid' = '$e_id'");
					if(mysqli_query($conn,$recycle)){
						header('Location: ../pages/issues.php?msg=1');
					}
					else{
						header('Location: ../pages/issues.php?msg=2');
					}
				}
			}else{
				echo "Comm Update failed";
			}
		}else{
			echo "select reported and comm failed";
		}	
	} else {
		echo "Set recycle failed ";
	}
	mysqli_close($conn);
?>