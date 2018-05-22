<?php
//require_once("dbCentral.php");

//$db_handle = new dbCentral();

session_start();
include 'dbconnection.php';
$con=mysqli_connect($server,$user,$pass,$dbname)
	or die("<br>Cannot connect to DB\n");

if(isset($_POST['submit'])){

		$coursename = $_POST['coursename'];
		$courseid = $_POST['courseid'];
		$semster = $_POST['semster'];
		$credit = $_POST['credit'];
		$startdate = $_POST['startdate'];
		$enddate = $_POST['enddate'];
		$professor = $_POST['pname'];

		//echo "$professor";
		


if($startdate < $enddate){


$query =  "SELECT course_id from courses WHERE course_id = '$courseid'";

	echo" <br>";
	$result = mysqli_query($con, $query);

	if(mysqli_num_rows($result) >0)
	{
 		//echo "Error! course id : $courseid already exist";
 		echo "Error! There exists a course with the course id: $courseid";
 		header( "refresh:2; url=add_course.php" );

 		/*header("Location: add_course.php");
		$_SESSION['success'] = 3;	
		exit();*/
	}

	else {

	$sql = "INSERT INTO courses(Course_id, Course_name, Semester, Credits, Start_date,End_date,Professor_name) VALUES ('$courseid', '$coursename','$semster', '$credit', '$startdate','$enddate', '$professor')";


	if (mysqli_query($con, $sql)) 
	{
    		//echo "Successfully run query: $sql";	
		header("Location: add_course.php");
		$_SESSION['success'] = 1;	
		
	}

	else{
		header("Location: add_course.php");
		$_SESSION['success'] = "0";
		
		//echo "Invalid input error: " . $sql . "<br>" . mysqli_error($con);

	}

	}

}



else {
		header("Location: add_course.php");
		$_SESSION['success'] = "2";
		exit();

		//echo "test";

}
	
	}//end for data check


else{
	//http_response_code(404);
	//include('404.php'); // provide your own HTML for the error page
	echo "You are not permited to access the page";
	die();
	
}

?>
