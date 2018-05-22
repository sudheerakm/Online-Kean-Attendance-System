<!DOCTYPE html>
<html lang="en">
<head>
     <title>Professor-home-page</title>
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
</head>

<?php 
session_start();

include 'dbconnection.php';

if(isset($_COOKIE["logincheck"])) { 

?>

<body>
<!--==============================header=================================-->

<?php
if(isset($_COOKIE["professor_login"])) { 
    $professor = $_COOKIE["professor_login"]; }
?>



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

<?php

$name = "$professor"."@kean.edu";


$professorquery = "SELECT * FROM Professor where Email_id='$name'";
$professsorresult = mysqli_query($con,$professorquery);
while($profresult = mysqli_fetch_array($professsorresult, MYSQLI_ASSOC)){
            $firstname= $profresult['First_name'];
            $lastname= $profresult['Last_name'];
            $fullname= $firstname." ". $lastname;
        }

    $query2 = " SELECT * FROM courses where Professor_name='$fullname'";
    $result2 = mysqli_query($con,$query2);
    ?>

<!--=======content================================-->
<div id="content">
<br>
    <div class="main-content-agile">
    <p style="text-align: center;font-weight: bold;font-size: 30px;">Welcome <?php echo "$fullname";?></p>

<div style="font-size: 24px; text-align: center;color: red;">

<?php
//echo "";
if(isset($_SESSION['success']) && $_SESSION['success'] == 1)
{
     echo "Attendance successfully marked";
     unset($_SESSION['success']);
} 
elseif(isset($_SESSION['success']) && $_SESSION['success'] == 0){
  echo "Something went wrong please try again";
  unset($_SESSION['success']);
}

elseif(isset($_SESSION['success']) && $_SESSION['success'] == 3){
  echo "Attendance successfully updated";
  unset($_SESSION['success']);
}

?>

</div>
    <div class="sub-main-w3">
    <?php 

    while($profrow = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
            $row4= $profrow['Course_id'];
            $row5= $profrow['Course_Name'];
            $row6= $row4." - ". $row5;
            ?>
             <form action="professor_student_attendance_page.php" method="GET">   	
        	<input type='hidden' name='var' value='<?php echo "$row4";?>'/> 
        	<input style="display: flex; justify-content: center; width: 100%; background-color:#009933; color: #ffffff; height: 70px; font-weight: bold;" type='submit' name='submit' value='<?php echo "$row6";?>'/> 
        	<br>
        </form>
   <!-- <a href="admin_login.html" class="btn" style="display: flex; justify-content: center;"> -->
    <?php
        
        //echo " $row6";
        }
        ?>
         
   </div>
   </div>
  <!-- insert code here !-->
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

<div style="text-align: center;font-size: 30px; font-weight: bold;margin-top: 25px;">
<?php
}
else {
    echo "You are not authorized to access the page.";
}
?>
</div>

</body>
</html>