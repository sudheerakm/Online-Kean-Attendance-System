
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

		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$professor_id = $_POST['professor_id'];
		$department = $_POST['department'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];

		$isValid = filter_var($email, FILTER_VALIDATE_EMAIL);
		list ($user, $domain) = explode('@', $email);
		$isGmail = ($domain == 'kean.edu');

	if ($isGmail == TRUE){


if($_POST['password'] == $_POST['password2']) 
{

	$query =  "SELECT Email_id from Professor WHERE Email_id = '$email'";

	echo" <br>";
	$result = mysqli_query($con, $query);

	if(mysqli_num_rows($result) >0){
 		echo "Error! There exists a user with the email_id: $email";
 		header( "refresh:2; url=add_professor.php" );

	}

	else {

	$sql = " INSERT INTO Professor(First_name, Last_name, Department, Email_id,Phone_number,Password) VALUES ('$firstname','$lastname', '$department', '$email', '$phone', '$password')";

	if (mysqli_query($con, $sql)) 
	{
    		//echo "Successfully run query: $sql";
		  
        
        $subject = $firstname."_New Professor Kean Attendance Account created";
        $link = "http://eve.kean.edu/~geethakd/CPS5920/keanattendance/ResetPassword_Professor.php?email_id=".$email;
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
                    New Professor Kean Attendance Account created.<br/>
                    Click here to change the password <a href="$link"> ResetPassword </a>
                     </td>
                </tr>
            </tbody>
        </table>
        
EOD;
    
        $headers .= 'From: <keanattendance@gmail.com>' . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        
        mail($email, $subject, $body, $headers );
        
        
		header("Location: add_professor.php");
		$_SESSION['success'] = 1;
		
		exit();

	} 
		else 
		{
    		header("Location: add_professor.php");

			$_SESSION['success'] = "0";
			exit();
		}
}
}

else
{	
		header("Location: add_professor.php");
		$_SESSION['success'] = "3";
		exit();
}
	
}//end for data check





	else{
	$mes = 'Enter valid Kean Email ID';

    echo "<SCRIPT type='text/javascript'> //not showing me this
        alert('$mes');
        window.location.replace(\"http:add_professor.php\");
    </SCRIPT>";
}


}




else
{
	
	echo "You are not permited to access the page";
	die();	
}

?>
</body>
</html>

