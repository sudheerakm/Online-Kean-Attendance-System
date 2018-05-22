<!DOCTYPE html>
<html lang="en">
<head>
     <title>Update course</title>
     <meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
     <link rel="icon" href="images/favicon.ico">
     <link rel="shortcut icon" href="images/favicon.ico" />
     <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="css/style_1.css" type="text/css" media="all" />
     <link rel="stylesheet" href="css/font-awesome.css">
     <link href="//fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	 <link rel="stylesheet" href="css/zerogrid.css" type="text/css" media="all">
	 <link rel="stylesheet" href="css/responsive.css" type="text/css" media="all">
	 <link rel="stylesheet" href="css/responsiveslides.css" />
     <script src="js/jquery.js"></script>
     <script src="js/jquery.easing.1.3.js"></script>
     <script src="js/jquery-migrate-1.1.1.js"></script>
     <script src="js/superfish.js"></script>
     <script src="js/jquery.equalheights.js"></script>
     <script src="js/tms-0.4.1.js"></script>
     <script src="js/jquery.carouFredSel-6.1.0-packed.js"></script>
     <script src="js/jquery.ui.totop.js"></script>
	 <script type="text/javascript" src="js/css3-mediaqueries.js"></script>
     <script src="js/responsiveslides.js"></script>
		<script>
	    $(function () {
	      $("#slider").responsiveSlides({
	        auto: true,
	        pager: false,
	        nav: true,
	        speed: 500,
	        maxwidth: 960,
	        namespace: "centered-btns"
	      });
	    });
	  </script>

	  <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
 
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>

<?php 
session_start();
include 'dbconnection.php';
if(isset($_COOKIE["Admin_login_cookie"])) { 
    //echo $_COOKIE["member_login"]; 

?>

<body>
<!--==============================header=================================-->
<header>
	<div class="zerogrid">
		<div class="col-full">
           <h1><a href="index.html"><img src="images/Kean_1.png" alt=""></a></h1>
		</div>
    </div>
    <nav>
        <div class="zerogrid" style="text-align: center;">
            <div class="col-full">
				<div class="wrap-col">
                <ul class="sf-menu">
                    <li class="current"><a href="admin_home_page.php">HOME</a></li>
                    <li><a href="#">ABOUT</a></li>
                    <!-- <li><a href="admin_login.php">ADMIN LOGIN</a></li> -->
                    <li class="w3-large"><a href="signout.php"><i class="glyphicon glyphicon-user"></i> Sign Out</a></li>
                </ul>
				</div>
            </div>
        </div>
    </nav>
</header>

<div>

<div style="text-align: center; color: red; font-weight: bold; font-size: 20px;">
<?php

if ( isset($_SESSION['success']) && $_SESSION['success'] == 1)
{
    
     echo "Course updated";
     unset($_SESSION['success']);
} 

elseif(isset($_SESSION['success']) && $_SESSION['success'] == 0){
  echo "Something went wrong please try again";
  unset($_SESSION['success']);
} 
?>

<br>
</div>
<?php

$query2 = " SELECT * FROM courses";
    $result2 = mysqli_query($con,$query2);

	//echo "<a href=\"logout.php\">Customer logout</a><br>";

	echo "<form name='input' action='admin_course_update.php' method='post' autocomplete='off' >
	<TABLE border=1>
	<tr><td bgcolor=yellow>Course ID<td bgcolor=yellow>Course Name<td bgcolor=yellow>Semster<td bgcolor=yellow>Credits<td bgcolor=yellow>Start Date<td bgcolor=yellow>End Date<td bgcolor=yellow>Professor name";

	while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
        $Courseid = $row['Course_id'];
       $coursename = $row['Course_Name'];
       $semster = $row['Semester'];
       $credits = $row['Credits'];
       $start = $row['Start_date'];
       $end = $row['End_date'];
       $professor = $row['Professor_name']; 

       //echo "$semster";

       

       /*echo "<tr><td>$Courseid<td><input type='text' name='coursename[]' size=30 value=$coursename><td><input type='text' name='semster[]' value=$semster><td><input type='number' name='credits[]' size=30 value= $credits><td><input type='Date' name='start[]' size=30 value=$start><td><input type='Date' name='end[]' size=30 value=$end><td><input type='text' name='professor[]' size=45 value=$professor></td></tr>

    <input type='hidden' name='courseid[]' value=$courseid>
";*/
?>
<tr><td><?php echo "$Courseid";?><td><input type='text' name='coursename[]' size=30 value=<?php echo "$coursename"; ?>><td><input type=text name='semster[]' value= <?php echo $row['Semester']; ?>><td><input type='number' name='credits[]' size=30 value= <?php echo "$credits"; ?>><td><input type='Date' name='start[]' size=30 value=<?php echo "$start"; ?>><td><input type='Date' name='end[]' size=30 value=<?php echo "$end"; ?>><td><input type='text' name='professor[]' size=45 value=<?php echo "$professor";?>></td></tr>

    <input type='hidden' name='courseid[]' value=<?php echo "$Courseid"; ?>>


    <!--echo " <tr><td>$Pid<td><input type='text' name='firstname' size=30 value=".$row['Firts_name']."><td><input type='text' name='lastname' size=30 value=".$row['Last_name']."><td><input type='email' name='email' size=30 value=".$row['Email_id']."><td><input type='text' name='department' size=30 value=".$row['Department']."><td><input type='number' name='phone' size=30 value=".$row['Phone_number']."><td><input type='text' name='password' size=30 value=".$row['Password']."></td></tr>


    //<input type='hidden' name='pid' value=".$row['Pid'].">";-->
<?php

}


    echo "</TABLE>
    <br>
    <input type='submit' value='Update information'>
    </form>
    <br>
    <br>";
//}

//else{
//  echo "you are not logged in";
//}


?>

</div>
<br>
<br>


<footer>
	<div class="zerogrid">
		<div class="col-2-3">
			<div class="wrap-col">
			<span>Privacy Policy | Designed by : Kean attendance system</span>
			</div>
		</div>
        <div class="col-1-3">
			<div class="wrap-col">
        	<ul class="soc-icon">
            	<li><a href="#"><img src="images/icon-3.png" alt=""></a></li>
                <li><a href="#"><img src="images/icon-2.png" alt=""></a></li>
                <li><a href="#"><img src="images/icon-1.png" alt=""></a></li>
            </ul>
			</div>
        </div>
	</div>
</footer>
<?php
}
else{
    echo "Not authorized to access this page without login";
}
?>

</body>
</html>
