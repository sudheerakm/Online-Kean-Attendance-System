
<!DOCTYPE html>
<html>
<head>
<title>Customer Page</title>
<style>
body  {
    background-image: url("image4.jpg");
    background-color: #cccccc;
}
</style>
</head>
<BODY>

<?php

include 'dbconnection.php';

$login_id =$_POST["Name"];
//$login_id = strtolower ( $login_id );
$login_id = "$login_id"."@kean.edu";

$password =trim($_POST["Password"]);
$remember =$_POST["remember"];

if(isset($_POST['Login']))
    {



echo "$login_id";
echo "$password";
echo "$remember";


$query = "SELECT * FROM Professor WHERE Email_id = $login_id AND BINARY password = '". mysqli_real_escape_string($con, $password) ."'" ;

    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if ($result) {
    if (mysqli_num_rows($result) == 0) {
        $query = "SELECT Email_id FROM Professor WHERE Email_id = '$login_id' ";
        $result = mysqli_query($con,$query);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if (mysqli_num_rows($result) == 1) {

        //echo "Customer with login_id ".$login_id." exists,but password not matches";
        header("Location: professor_login.php");
        $_SESSION['success'] = 5;


    }
    else{
        //echo "Authentication error, please try again";
        header("Location: professor_login.php");
        $_SESSION['success'] = 6;    
    }
    } 

else{

    
     if (mysqli_num_rows($result) == 1 ) {

       /* setcookie('username', $login_id, time() + (3600), "/");
        //setcookie('password', $password, time() + (3600), "/");

        echo "Welcome customer: ", $row['first_name'], " " , $row['last_name'] ;
        echo "<br><br>";
        echo $row['address'], ", ",  $row['city'], ", ", $row['state'], " ",  $row['zipcode'],"<BR><br>";  

                    $ip =  $_SERVER['REMOTE_ADDR'];
                    echo "Your IP address: ",  $ip , "<br><br>";    
                    $ip_subnet=explode(".",$ip);
                    if (($ip_subnet[0]=="131" and $ip_subnet[1]=="125") or $ip_subnet[0]=="10")
                    {
                    echo "<br><br>You are from kean university domain<br><br>";
                    }
                    else {
                    echo "Your are not from Kean university domain<br><br>";
                    }

                    echo "<a href=\"logout.php\">Customer logout</a>";
                    echo "<br><br>";

                    echo "<a href=\"customer_update.php\">Update my data</a>";
                    echo "<br><br>";

                    echo "<a href=\"index.php\">Project Home Page</a>";
                    echo "<br><br>";*/
    
   }


}
   
}

//}
}

else {

    echo "You are not authorized to access this page without login. Please login <br />";
}



?>
</BODY>
</HTML>


