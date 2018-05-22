<?php
//require_once("dbCentral.php");

//$db_handle = new dbCentral();
session_start();
include 'dbconnection.php';

	
$con=mysqli_connect($server,$user,$pass,$dbname)
	or die("<br>Cannot connect to DB\n");


if(isset($_POST['submit']))
{

		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$department = $_POST['department'];
		$email_id = $_POST['email_id'];
		$studentid = $_POST['studentid'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];


$isValid = filter_var($email_id, FILTER_VALIDATE_EMAIL);
		list ($user, $domain) = explode('@', $email_id);
		$isGmail = ($domain == 'kean.edu');

	if ($isGmail == TRUE){







	if($_POST['password'] == $_POST['password2']) 
	{

		$query =  "SELECT sid from students WHERE sid = '$studentid' or Email_id = '$email_id'";

	echo" <br>";
	$result = mysqli_query($con, $query);

	if(mysqli_num_rows($result) >0){
 		//echo "Error! There exists a user with student id: $studentid";
 		header("Location: add_student.php");

			$_SESSION['success'] = "2";
			exit();
	}

else {

	$sql = " INSERT INTO students(Student_id,First_name, Last_name, Department, Email_id,Password) VALUES ('$studentid','$firstname', '$lastname', '$department', '$email_id', '$password')";

	if (mysqli_query($con, $sql))
	{
    		//echo "Successfully run query: $sql";
			 $subject = $firstname."_Your New Student Kean Attendance Account created";
			 $link = "http://eve.kean.edu/~geethakd/CPS5920/keanattendance/ResetPassword_student.php?email_id=".$email_id;
$body = <<<EOD
        
        <table cellspacing="0" cellpadding="1" border="1">
            <tbody>
                <tr>
                    <td style="padding: 5px 10px;" width="150">Name: </td>
                    <td style="padding: 5px 10px;">$firstname</td>
                </tr>
                <tr>
                    <td style="padding: 5px 10px;" width="150">Password: </td>
                    <td style="padding: 5px 10px;">$password</td>
                </tr>                
                <tr>
                    <td style="padding: 5px 10px;" width="150">Message: </td>
                    <td style="padding: 5px 10px;">
                    New Student Kean Attendance Account created.<br/>
                    Click here to change the password <a href="$link"> ResetPassword </a>
                     </td>
                </tr>
            </tbody>
        </table>
        
EOD;
    
        $headers .= 'From: <keanattendance@gmail.com>' . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        
        mail($email_id, $subject, $body, $headers );
		header("Location: add_student.php");
		$_SESSION['success'] = 1;
		
		exit();

	} 
		else 
		{
			//echo "Invalid input error: " . $sql . "<br>" . mysqli_error($con);
    		header("Location: add_student.php");

			$_SESSION['success'] = "0";
			exit();
		}
	}
}

else
{	
		header("Location: add_student.php");
		$_SESSION['success'] = "3";
		exit();
}






}

else{
	$mes = 'Enter valid Kean Email ID';

    echo "<SCRIPT type='text/javascript'> //not showing me this
        alert('$mes');
        window.location.replace(\"http:add_student.php\");
    </SCRIPT>";
}





}

else{
	//http_response_code(404);
	//include('404.php'); // provide your own HTML for the error page
	echo "You are not permited to access the page";
	die();
	
}

?>
