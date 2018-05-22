
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php
session_start();
include 'dbconnection.php';

	
$con=mysqli_connect($server,$user,$pass,$dbname)
	or die("<br>Cannot connect to DB\n");

if(isset($_POST['submit']))
{
	$email = $_POST['studentid']; 
		$studentname = $_POST['student'];
		$courseid = $_POST['courseid'];
		$plastname = $_POST['plastname'];
		$year = $_POST['yearly'];
		$Semster = $_POST['Semster'];

		echo "$courseid";
		echo "$studentname";


$student =  "SELECT Sid from students WHERE Email_id = '$email'";
$studentresult = mysqli_query($con, $student);
while($srow = mysqli_fetch_array($studentresult, MYSQLI_ASSOC)){
            $ssid= $srow['Sid'];
        }

$query =  "SELECT * from student_course WHERE Sid = '$ssid' and Course_id = '$courseid' and Semester = '$Semster' and year='$year'";
	$result = mysqli_query($con, $query);

	if(mysqli_num_rows($result) >0){
 		//echo "Error! There exists a user with student id: $studentid";
 		header("Location: student_course.php");

			$_SESSION['success'] = "2";
			exit();
	}
	else{

	$sql = " INSERT INTO student_course(Sid,Course_id, Semester, Year) VALUES ('$ssid','$courseid', '$Semster','$year')";

	if (mysqli_query($con, $sql)) 
	{
    		//echo " success";

    		//echo "Error! course id : $courseid already exist";
		
		header("Location: student_course.php");
		$_SESSION['success'] = 1;
		
		//exit();

	} 
		else 
		{
echo "error: " . $sql . "<br>" . mysqli_error($con);
    		//header("Location: student_course.php");

			//$_SESSION['success'] = "0";
			//exit();
		}


	
}//end for data check
}
else
{
	
	echo "You are not permited to access the page";
	die();	
}

?>
</body>
</html>

