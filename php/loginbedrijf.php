<?php 
	session_start(); 
	include "connection.php";

	if (isset($_POST['kvk']) && isset($_POST['password'])) {

		function validate($data){
       		$data = trim($data);
	   		$data = stripslashes($data);
	   		$data = htmlspecialchars($data);
	   		return $data;
		}

		$kvk = validate($_POST['kvk']);
		$pass = validate($_POST['password']);

		if (empty(is_numeric($kvk))) {
			header('Location: ../html/loginbedrijf.html?error=kvk-is-required');
	    	exit();
		}else if(empty($pass)){
        	header('Location: ../html/loginbedrijf.html?error=Password-is-required');
	    	exit();
		}else{
			$sql = "SELECT * FROM bedrijf WHERE kvk='$kvk'";

			$result = mysqli_query($conn, $sql);

		 

		
			if (mysqli_num_rows($result) === 1) {
				$row = mysqli_fetch_assoc($result);

            	if ($row['kvk'] === $kvk && password_verify($pass, $row['password'])) {

					if($row['isADMIN']){
						$_SESSION['naam'] = $row['naam'];
						// header("Location: admin.php");
						exit();
					} else {
						$_SESSION['kvk'] = $row['kvk'];
            			$_SESSION['naambedrijf'] = $row['naambedrijf'];
						$_SESSION['stad'] = $row['stad'];
            			header('Location: ../php/dashboard-bedrijf.php');
		        		exit();
					}
            	}else{
					header('Location: ../html/loginbedrijf.html?succus=false1');
					$_SESSION = [];
					session_destroy();
		        	exit();
				}
			}else{
				echo $kvk;
				echo $pass;
				header('Location: ../html/loginbedrijf.html?succus=false2');
	        	exit();
			}
		}
	}else{
		header("Location: ../index.php");
		exit();
		echo "failed login";
	}

?>
