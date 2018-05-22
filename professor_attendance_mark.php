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
		//$attending = (int)$_POST['attending'];
						//echo "$attending";
		

$i=0;
		$checked = isset($_REQUEST['attending']) ? $_REQUEST['attending'] : false;
if($checked) {
foreach($checked as $user_id) {

$attending[$i] = $user_id;
$i++;

}
}


			for ($i = 0; $i <count($studentid) ; $i++) {
				$stuid = $studentid[$i];
				$couid = $courseid[$i];
				$att = $attending[$i];
				$sname = $studentname[$i];
				$att = $attending[$i];
				//echo "$att";
				

				
				//$att = $attending[$i];
				//$att = $attending[$i];

				$sql = "INSERT INTO Attendance_Sheet(Date,Sid,Student_Name,Course_id,Status) VALUES ('$attdate','$stuid','$sname','$couid', '$att')";

if (mysqli_query($con, $sql)) 
	{
    		//echo "Successfully run query: $sql";
		
		header("Location: professor_home_page.php");
		$_SESSION['success'] = 1;
		
		

	} 
		else 
		{
			echo "Invalid input error: " . $sql . "<br>" . mysqli_error($con);
    		//header("Location: professor_home_page.php");
			//$_SESSION['success'] = "0";
			
		} 


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
