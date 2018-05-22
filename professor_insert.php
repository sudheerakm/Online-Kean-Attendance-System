<HTML>
<?php

include 'dbconnection.php';


		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$department = $_POST['department'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];


//if ( count($_POST) >= 7 ) {

	if($_POST['password'] == $_POST['password2']) {

		$sql = " INSERT INTO Professor (First_name,Last_name,Department, Email_id, Phone_numbe, Password) VALUES ('$firstname','$lastname','$department','$email','$phone','$password','$password2')";

		if (mysqli_query($con, $sql)) {
    		header("Location: add_professor.php");
			$_SESSION['success'] = 1;
		//header("Location: customer_signup_created.php");
			exit();

    		}
		else {
    		header("Location: add_professor.php");
		$_SESSION['success'] = 0;
		//header("Location: customer_signup_created.php");
		exit();
		}

 	}

//}

else{
	header("Location: add_professor.php");
		$_SESSION['success'] = 3;
		//header("Location: customer_signup_created.php");
		exit();
	
}

?>
</HTML>
