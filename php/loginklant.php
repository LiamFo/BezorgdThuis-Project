<?php 
session_start(); 
include "connection.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);

	if (empty($email)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM accounts WHERE email='$email'";

		$result = mysqli_query($conn, $sql);

		 

		
		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);

            if ($row['email'] === $email && password_verify($pass, $row['password'])) {

				if($row['isADMIN']){
					$_SESSION['username'] = $row['username'];
					header("Location: admin.php");
					exit();
				} else {
					$_SESSION['email'] = $row['email'];
            		$_SESSION['username'] = $row['username'];
					$_SESSION['idaccount'] = $row['idaccount'];
            		header("Location: index.php");
		        	exit();
				}
            }else{
				header("Location: index.php?error=Incorect User name or password");
				$_SESSION = [];
				session_destroy();
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}