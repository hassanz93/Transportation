<?php 

include "db_conn.php";


	function test_input($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$useremail = test_input($_POST['useremail']);
	$userpass = test_input($_POST['userpass']);
	

	if (empty($useremail)) {
		echo("email required");
	}
	else if(empty($userpass)){
		echo("password required");
	    exit();

	}else{
	
		// hashing the password

        // email verification
		$sql = "SELECT * FROM tbluser WHERE email='$useremail' AND password= '$userpass' ";

		$result = mysqli_query($conn, $sql);
	
		if (mysqli_num_rows($result) > 0) {
		
			$row = mysqli_fetch_assoc($result);
            if ($row['email'] === $useremail && $row['password'] === $userpass) {
				session_start(); 
            	$_SESSION['email'] = $row['email'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['id'] = $row['user_id'];
				$_SESSION['username']= $row['username'];
				$_SESSION['phone']= $row['phone'];
				$_SESSION['role']= $row['Role'];
				echo("Location: ../html/main.php");

		        exit();
            }
			}
			else{
			
		
				echo("Incorrect Email or password");
		        exit();
		}
		}