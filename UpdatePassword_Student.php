<?php
include "dbconfig.php";
//session_start();
//$myLoginId= $_SESSION["loginid_from_session"] ;
//echo "from session".$myLoginId;

$myemailid=$_POST["email_id"];
$myPassword=$_POST["password"];
$myConfirmPasasword=$_POST["password2"];



	$conn = new mysqli($servername, $username, $password, $dbname);	 
	 if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	 }
	 if($myPassword== $myConfirmPasasword){
	 $query = "UPDATE students set password='$myPassword' where Email_id='$myemailid'";
	 
	 if ($conn->query($query) === TRUE) {
        $message = "Sucessfully Updated Password" ;
			echo $message;
	} else {
    echo "Error: " . $query . "<br>" . $conn->error;
	}
}
else{
	$message = "Password and confirm password dont match";
	echo $message;
	}
	$conn->close();

	
?>

