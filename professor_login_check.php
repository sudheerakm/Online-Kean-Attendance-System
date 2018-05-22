<?php

include "dbconfig.php";

	$myUsername= $_POST['username'];
	$myPassword=$_POST['password'];
	$remember= $_POST['remember'];
	$myusername = "$myUsername".'@kean.edu';

	setcookie ("logincheck","$myUsername",time()+ (3600));

	if(!empty($remember)) {
		setcookie ("professor_login",$_POST["username"],time()+ (3600));
		setcookie ("professor_password",$_POST["password"],time()+ (3600));
			} else {
				
				setcookie ("professor_login",$_POST["username"],time()+ (10 * 365 * 24 * 60 * 60));
				setcookie ("professor_password",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));
			}


	 $conn = new mysqli($servername, $username, $password, $dbname);
	 
	 if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	 }
	 
	 $query = "SELECT * FROM Professor where Email_id='$myusername' and binary Password='$myPassword'";
	 $result = mysqli_query($conn,$query);
	 $row = mysqli_fetch_assoc($result);
	
	 if($result){
 		if ($result->num_rows == 0) {
 			$query = "SELECT * FROM Professor where Email_id='$myusername'";
	 		$result = mysqli_query($conn,$query);
	 		$row = mysqli_fetch_assoc($result);
	 		if ($result->num_rows > 0) { 			 
	 			
	 			$message = "Username".$myusername." exists,but password not matches";
	 			 echo $message;
	 		
	 		} else{
				$message ="Username ".$myusername." doesn't exists in the database"; 
				echo $message;
	 		
	 		}
  		} else{
  			$cookie_name = "Admin_login_cookie";
			$cookie_value = $myUsername;
			setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
			$message = "Success";
			echo $message;

  		}
	 }	
 
?>


