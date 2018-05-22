<?php

include "dbconfig.php";

	$myUsername= $_POST['username'];
	$myPassword=$_POST['password'];
	$check =$_POST['remember'];
	// echo "$check";


		// if(empty($check)) {
		// setcookie ("member_login",$_POST["username"],time()+ (10 * 365 * 24 * 60 * 60));
		// setcookie ("member_password",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));
		// 	} else {
		// 		if(isset($_COOKIE["member_login"])) {
		// 			setcookie ("member_login","");
		// 		}
		// 		if(isset($_COOKIE["member_password"])) {
		// 			setcookie ("member_password","");
		// 		}
				
		// 		setcookie ("member_login",$_POST["username"],time()+ (10 * 365 * 24 * 60 * 60));
		// 		setcookie ("member_password",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));
		// 	}

		// 	/*if(isset($_POST['formWheelchair']) && $_POST['formWheelchair'] == 'Yes') 
		// 	{
		// 		setcookie ("member_login",$_POST["username"],time()+ (10 * 365 * 24 * 60 * 60));
		// 		setcookie ("member_password",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));
  //  */
		// 	}






	 $conn = new mysqli($servername, $username, $password, $dbname);
	 
	 if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	 }
	 
	 $query = "SELECT * FROM Admin where Username='$myUsername' and binary Password='$myPassword'";
	 $result = mysqli_query($conn,$query);
	 $row = mysqli_fetch_assoc($result);


	
	 if($result){
 		if ($result->num_rows == 0) {
 			$query = "SELECT * FROM Admin where Username='$myUsername'";
	 		$result = mysqli_query($conn,$query);
	 		$row = mysqli_fetch_assoc($result);
	 		if ($result->num_rows > 0) { 			 
	 			
	 			$message = "Username".$myUsername." exists,but password not matches";
	 			 echo $message;
	 		
	 		} else{
				$message ="Username ".$myUsername." doesn't exists in the database"; 
				echo $message;
	 		
	 		}
  		} else{
  			$cookie_name = "Admin_login_cookie";
			$cookie_value = $_POST['username'];
			setcookie($cookie_name, $cookie_value, time() + 3600, "/");
			$message = "Success";
			echo $message;

			//if((!empty($_POST['remember'])) or ($_POST['remember']=="0")) {
			/*if(!empty($_POST["remember"])) {
				setcookie ("member_login",$_POST["member_name"],time()+ (10 * 365 * 24 * 60 * 60));
				setcookie ("member_password",$_POST["member_password"],time()+ (10 * 365 * 24 * 60 * 60));
			} else {
				if(isset($_COOKIE["member_login"])) {
					setcookie ("member_login","");
				}
				if(isset($_COOKIE["member_password"])) {
					setcookie ("member_password","");
				}
			}*/








	} 

  		}	
 
?>


