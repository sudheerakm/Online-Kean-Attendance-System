<?php

include "dbconfig.php";

	$myUsername= $_POST['username'];
	$myPassword=$_POST['password'];


	 $conn = new mysqli($servername, $username, $password, $dbname);
	 
	 if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	 }
	 
	 $query = "SELECT * FROM students where Email_id='$myUsername' and binary Password='$myPassword'";
	 $result = mysqli_query($conn,$query);
	 $row = mysqli_fetch_assoc($result);
	
	 if($result){
 		if ($result->num_rows == 0) {
 			$query = "SELECT * FROM students where Email_id='$myUsername'";
	 		$result = mysqli_query($conn,$query);
	 		$row = mysqli_fetch_assoc($result);
	 		if ($result->num_rows > 0) { 			 
	 			
	 			$message = "Email_id ".$myUsername." exists,but password not matches";
	 			 echo $message;
	 		
	 		} else{
				$message ="Email_id ".$myUsername." doesn't exists in the database"; 
				echo $message;
	 		
	 		}
  		} else{
  			$cookie_name = "student_login_cookie";
			$cookie_value = $myUsername;
			setcookie($cookie_name, $cookie_value, time() +3600,"/");
			$message = "Success";
			echo $message;

  		}
	 }	
 
?>


