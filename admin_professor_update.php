<HTML>
<?php
include 'dbconnection.php';
session_start();

	
//$con=mysqli_connect($server,$user,$pass,$dbname)
	//or die("<br>Cannot connect to DB\n");

 session_start();
  $row = $_SESSION['row'];

$pid = $_POST['pid'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email= $_POST['email'];
$department= $_POST['department'];
$phone = $_POST['phone'];
$password = $_POST['password'];

for($i = 0; $i <count($pid) ; $i++){ 

$sql =  " UPDATE Professor set 
			First_name = '$firstname[$i]',
			Last_name = '$lastname[$i]',
			Department = '$department[$i]',
			Phone_number = '$phone[$i]',
			password = '$password[$i]',
			Email_id = '$email[$i]'
            where Pid='$pid[$i]'";  


if (mysqli_query($con, $sql)) {
    		echo "Successfully run query: $sql";
			header("Location: admin_professor_display.php");
			$_SESSION['success'] = 1;
			//exit();
	} else {
    		echo "error: " . $sql . "<br>" . mysqli_error($con);
		//header("Location: admin_professor_display.php");
		//$_SESSION['success'] = 0;
		//exit();
	}
}

?>
</HTML>