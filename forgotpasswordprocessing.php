<?php
session_start();
session_destroy();
include 'dbconnection.php';



//if(isset($_POST['forgot'])){
	//if ( count($_POST) > 1 ) {
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$Email = $_POST['email_id'];



		$isValid = filter_var($Email, FILTER_VALIDATE_EMAIL);
		list ($user, $domain) = explode('@', $Email);
		$isGmail = ($domain == 'kean.edu');

	if ($isGmail == TRUE){


		
		$query = "SELECT * from Professor where Email_id='$Email'";
		//$query = "SELECT * from Professor where First_name = '$firstname' and Last_name = '$lastname' and Email_id = '$Email'";

		$result = mysqli_query($con,$query);
			//$result = $db_handle->selectWhereQuery($query);
	 $row = mysqli_fetch_assoc($result);

		//if ($result && mysqli_num_rows($result)>0){
		if($result){

			//$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

			$_SESSION['sid']=session_id();
			$_SESSION['custRow'] = $row;

			$password = $row['Password'];
			$to = $row['Email_id'];
			$subject = "Your recovered password";
			$message = "Please use this password to login - ". $password;
			$headers = "From : geethakd@kean.edu";
			if (mail($to, $subject, $message,$headers)){
				$mes = 'Password has been send to your email ID';
				mysql_close();

    echo "<SCRIPT type='text/javascript'> //not showing me this
        alert('$mes');
        window.location.replace(\"http:forgotpassword.php\");
    </SCRIPT>";


			}
		}
		
	
else{
			//echo "Failed to recover your password. Try again";
					$mess = 'Failed to recover your password. Try again';

    echo "<SCRIPT type='text/javascript'> //not showing me this
        //alert('$mess');
       // window.location.replace(\"http:forgotpassword.php\");
    //</SCRIPT>";
 mysql_close();

		}


	}

	else{
	$mes = 'Enter valid Kean Email ID';

    echo "<SCRIPT type='text/javascript'> //not showing me this
        alert('$mes');
        window.location.replace(\"http:forgotpassword.php\");
    </SCRIPT>";
}
		?>

