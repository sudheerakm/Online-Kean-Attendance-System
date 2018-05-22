<HTML>
<?php
include 'dbconnection.php';
session_start();

	
//$con=mysqli_connect($server,$user,$pass,$dbname)
	//or die("<br>Cannot connect to DB\n");

 session_start();
  $row = $_SESSION['row'];

$courseid = $_POST['courseid'];
$coursename = $_POST['coursename'];
$semster = $_POST['semster'];
$credits= $_POST['credits'];
$start= $_POST['start'];
$end = $_POST['end'];
$Professor = $_POST['professor'];

for($i = 0; $i <count($courseid) ; $i++){ 

$sql =  " UPDATE courses set 
			Course_Name = '$coursename[$i]',
			Semester = '$semster[$i]',
			Credits = '$credits[$i]',
			Start_date = '$start[$i]',
			End_date = '$end[$i]',
			Professor_name = '$Professor[$i]'
            where Course_id='$courseid[$i]'";  


if (mysqli_query($con, $sql)) {
    		echo "Successfully run query: $sql";
			header("Location: admin_course_display.php");
			$_SESSION['success'] = 1;
			//exit();	
	} else {
    		echo "error: " . $sql . "<br>" . mysqli_error($con);
		header("Location: admin_course_display.php");
			$_SESSION['success'] = 0;
			//exit();
	}
}

?>
</HTML>