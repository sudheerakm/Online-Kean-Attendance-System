<?php
//require_once("dbCentral.php");

//$db_handle = new dbCentral();
session_start();
include 'dbconnection.php';

	
$con=mysqli_connect($server,$user,$pass,$dbname)
	or die("<br>Cannot connect to DB\n");


if(isset($_POST['Submit']))
{
		$studentid = $_POST['sid'];
		$studentname = $_POST['studentname'];
		$courseid = $_POST['courseid'];
		$attdate = $_POST['attendancedate'];
		//$attmark = $_POST['attendancemark'];
		$attending = $_POST['optradio'];

		

		
				//$att = $attending[$i];
				//$att = $attending[$i];

				//$sql = "update 2017F_sivaramh.Attendance_Sheet set Date='$attdate', Course_id='$courseid', Status='$attending' 
//where Sid='$studentid' and Date= '$attmark' and Course_id='$courseid'";

$sql="update 2017F_sivaramh.Attendance_Sheet  
set Status='$attending' 
where Sid='$studentid' and Date= '$attdate' and Course_id='$courseid'";

if (mysqli_query($con, $sql)) 
	{
    		//echo "Successfully run query: $sql";
		header("Location: professor_home_page.php");
		$_SESSION['success'] = "3";
		//exit();
		
		

	} 
		else 
		{
			//echo "Invalid input error: " . $sql . "<br>" . mysqli_error($con);
    		header("Location: professor_home_page.php");
			$_SESSION['success'] = "0";
			
		} 


			

				//echo "$studentname";









			//}










		







}

else{
	//http_response_code(404);
	//include('404.php'); // provide your own HTML for the error page
	echo "You are not permited to access the page";
	die();
	
}

?>
