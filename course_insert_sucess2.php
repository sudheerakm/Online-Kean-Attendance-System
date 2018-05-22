<?php
require_once("dbCentral.php");

$db_handle = new dbCentral();


if(isset($_POST['submit'])){

		$coursename = mysql_real_escape_string($_POST['coursename']);
		$courseid = mysql_real_escape_string($_POST['courseid']);
		$semster = mysql_real_escape_string($_POST['semster']);
		$credit = mysql_real_escape_string($_POST['credit']);
		$startdate = mysql_real_escape_string($_POST['startdate']);
		$enddate = mysql_real_escape_string($_POST['enddate']);
		$professor = mysql_real_escape_string($_POST['professor']);


//if($_POST['password'] == $_POST['password2']) {
	$query = "INSERT INTO Professor(firstname, lastname, department, email,phone,password) VALUES ('$firstname','$lastname', '$department', '$email', '$password')";
	$resultset = $db_handle->insertQuery($query);

	//echo $resultset;


	if($resultset){
		$custInfo = array($username, $password, $firstname, $middlename, $lastname, $address, $state, $zipcode, $city, $tel, $email);

		$_SESSION['custInfo'] = $custInfo;



		header("Location: add_course2.php");
		$_SESSION['success'] = 1;
		//header("Location: customer_signup_created.php");
		exit();

	}

	else{

		
		header("Location: add_course2.php");
		$_SESSION['success'] = 0;
		//header("Location: customer_signup_created.php");
		exit();

	}

//}

//else{

		
		//header("Location: add_professor.php");
		//$_SESSION['success'] = 3;
		//header("Location: customer_signup_created.php");
		//exit();

	//}


	
	}//end for data check


else{
	//http_response_code(404);
	//include('404.php'); // provide your own HTML for the error page
	echo "You are not permited to access the page";
	die();
	
}

?>
