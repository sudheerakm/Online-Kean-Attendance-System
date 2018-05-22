<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php

include 'dbconnection.php';
include "dbconfig.php";

if(isset($_POST) & !empty($_POST)){
	$myUsername = $_POST['username'];
	echo "$myUsername";


	$query = "SELECT * FROM Admin where Username='$myUsername'";
	 		$result = mysqli_query($conn,$query);
	 		$row = mysqli_fetch_assoc($result);
	 		if ($result->num_rows > 0) { 



	//$username = mysqli_real_escape_string($conn, $user);
	//$sql = "SELECT * FROM Admin WHERE Username = '$user'";
	//$res = mysqli_query($conn, $sql);
	//$count = mysqli_num_rows($res);
	//if($count > 0){
		echo "Send email to user with password";
	}else{
		echo "User name does not exist in database";
	}
}

?>
</body>
</html>