<HTML>
<?php
include 'dbconnection.php';
session_start();

	
//$con=mysqli_connect($server,$user,$pass,$dbname)
	//or die("<br>Cannot connect to DB\n");

 session_start();
  $row = $_SESSION['row'];

$sid = $_POST['sid'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email= $_POST['email'];
$department= $_POST['department'];
//$phone = $_POST['phone'];
$password = $_POST['password'];

for($i = 0; $i <count($sid) ; $i++){ 

$sql =  " UPDATE students set 
			First_name = '$firstname[$i]',
			Last_name = '$lastname[$i]',
			Department = '$department[$i]',
			Email_id = '$email[$i]',
			password = '$password[$i]'
            where Sid='$sid[$i]'";  


if (mysqli_query($con, $sql)) {
    		//echo "Successfully run query: $sql";
			header("Location: admin_student_display.php");
			$_SESSION['success'] = 1;
			//exit();
	} else {
    		//echo "error: " . $sql . "<br>" . mysqli_error($con);
		header("Location: admin_student_display.php");
			$_SESSION['success'] = 0;
			//exit();
	}
}

?>
</HTML>