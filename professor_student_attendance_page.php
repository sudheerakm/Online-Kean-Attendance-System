<!DOCTYPE html>
<html lang="en">
<head>
     <title>Student Attendance</title>
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
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
    font-size: 24px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
    font-weight: bold;
    font-size: 24px;
}

body
{
    counter-reset: Serial;           /* Set the Serial counter to 0 */
}

table
{
    border-collapse: separate;
}

tr td:first-child:before
{
  counter-increment: Serial;      /* Increment the Serial counter */
  content: "" counter(Serial); /* Display the counter */
}

</style>
</head>

<?php 
session_start();
include 'dbconnection.php';
$courseid = $_GET['var'];
$courseid = $courseid;
$cou = "user";
setcookie("user", $courseid, time() + (86400 * 30), "/");


if(isset($_COOKIE["logincheck"])) { 
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
                    <li class="current"><a href="professor_home_page.php">HOME</a></li>
                    <li><a href="#">ABOUT</a></li>
                    <li><a href="professor_report_options.php">REPORT</a></li>
                    <li class="w3-large"><a href="signout2.php"><i class="glyphicon glyphicon-user"></i> Sign Out</a></li>
                </ul>
				</div>
            </div>
        </div>
    </nav>
</header>

<div id="content">
<div class="main-content-agile">

<form action="professor_student_attendance_page2.php" method="POST">
                <br>
                <p style="color: #fe8948; font-size: 24px; font-weight: bold;margin-left: 5px;">Search student to update attendance </p>
                <input style="margin-left: 5px; height: 50px; width: 300px;border-style: inset;border-color: #b3dbff; border-style: 2px solid;background-color: #F0F8FF;" type="text" name="searchname" placeholder="Search Student"></input>
                <button style="height: 50px; width: 50px;background-color: #F0F8FF; border-color: #b3dbff" type="submit" name="search"><i class="fa fa-search"></i> </button>
             </form>
             <p style="text-align: center;font-weight: bold;font-size: 30px;">Course ID :  <?php echo "$courseid"?></p>

<div style="text-align: center;font-weight: bold;font-size: 20px; margin: 0px;">
             <form action="professor_attendance_mark.php" method="POST">  
            Attendance Date <input type="date" name="attendancedate" max="<?php echo date('Y-m-d'); ?>" value="<?php echo date('Y-m-d'); ?>">
            </div>
<table id="customers" style="margin:0px;">
  <tr>
    <th>Serial Number</th>
    <th>Student Name</th> 
    <th>Attendance</th>
  </tr>

<?php
//echo "$courseid";
$studentlist = " SELECT * FROM student_course where Course_id='$courseid'";
    $studentresult = mysqli_query($con,$studentlist);
    while($studentrow = mysqli_fetch_array($studentresult, MYSQLI_ASSOC)){
            $studentid= $studentrow['Sid'];
            //echo "$studentid";

    $query2 = " SELECT * FROM students where Sid='$studentid'";
    $result2 = mysqli_query($con,$query2);
?>


<!--=======content================================-->

<?php 
while($profrow = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
            $row4= $profrow['First_name'];
            $row5= $profrow['Last_name'];
            $row7= $profrow['Sid'];
            $row6= $row4." ". $row5;
            ?>

               
            <input type='hidden' name='sid[]' value='<?php echo "$row7";?>'/> 
            <input type='hidden' name='studentname[]' value='<?php echo "$row6";?>'/> 
            <input type='hidden' name='courseid[]' value='<?php echo "$courseid";?>'/> 
            <tr>
            <td></td>
    <td><?php echo "$row6"; ?></td>
    <?php 
    $x++;
    ?>
    <td><label style= "color: black;" class="radio-inline">
      <input type="radio" name="attending[<?php echo "$x";?>]" value="Present" checked="">Present
    </label>
    <label style= "color: black;" class="radio-inline">
      <input type="radio" name="attending[<?php echo "$x";?>]" value="Absent" >Absent
    </label>
    <label style= "color: black;" class="radio-inline">
      <input type="radio" name="attending[<?php echo "$x";?>]" value="Sick" >Sick
    </label></td>
  </tr>
  <br>
  

<?php

//<?php echo "$x"; 
            }
        }
 
    ?>  
    </table>   
        <br>
        	<input style="display: flex; justify-content: center; width: 25%; background-color:#009933; color: #ffffff; height: 70px; font-weight: bold; margin-left: 650px;" type='submit' name='Submit' value='Submit'/> 
        	<br>
        </form>
   </div>
   </div>	
	<br>  
</div>

<!--==============================footer=================================-->
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
else {
    echo "404: Sorry this page cannot be found.";
}
?>

</body>
</html>