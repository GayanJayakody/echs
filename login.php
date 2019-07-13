<?php

	session_start();

    $email=$_POST["email"];
	$PW=$_POST["password"];
	
	$test=TRUE;

    $ValidEmail=FALSE;
	$ValidPW=FALSE;
	
	$_SESSION['email']=$email;

    $conn = new mysqli("localhost", "root", "", "echs_database");
	// Check connection
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT * FROM accountdetails";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
    	// output data of each row
    	while($row = $result->fetch_assoc()) {
    		
        		if($email==$row['Email']){
					$ValidEmail=TRUE;
					if(password_verify($PW,$row['Password'])){
						if($row['approved']=="False"){
							echo "not-created";
							$test=FALSE;
						}else{
							$admin=$row['Admin'];
							if($admin=="Admin"){
								$ValidPW=TRUE;
								echo "success-admin";
							}else if($admin=="Member"){
								$ValidPW=TRUE;
								echo "success-member";
							}
						}
					}
				}
			
		}
		if(!$ValidEmail && $test){
			echo "Invalid Email";
		}elseif(!$ValidPW && $test){
			echo "Password Incorrect";
		}
		
	}
	
	
	$conn->close();
	
?>