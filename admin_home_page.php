<!DOCTYPE html>
<html lang="en">
<head>
     <title>Admin-home-page</title>
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
// session_start();
if(isset($_COOKIE["Admin_login_cookie"])) { 
    

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
                    <li class="current"><a href="index.html">HOME</a></li>
                    <li><a href="#">ABOUT</a></li>                    
                    <li class="w3-large"><a href="signout.php"><i class="glyphicon glyphicon-user"></i> Sign Out</a></li>
                </ul>
				</div>
            </div>
        </div>
    </nav>
</header>

<!--=======content================================-->
<div id="content">
	

    <div class="main-content-agile">
    <br><br>
    <p style="text-align: center;font-weight: bold;font-size: 30px;">Welcome <?php if(isset($_COOKIE["Admin_login_cookie"])) { echo $_COOKIE["Admin_login_cookie"]; } ?></p>
    <div class="sub-main-w3">
    <a href="adduser.php" class="btn" style="display: flex; justify-content: center;">Add User</a>
    <a href="updateuser.php" class="btn" style="display: flex; justify-content: center;">Update User</a>
    <!-- <a href="add_course.php" class="btn" style="display: flex; justify-content: center;">Add Course</a>
    <a href="student_course.php" class="btn" style="display: flex; justify-content: center;">Add Student to course</a> -->
    <!-- <a href="admin_professor_display.php" class="btn" style="display: flex; justify-content: center;">Update User - Professor</a>
     <a href="admin_student_display.php" class="btn" style="display: flex; justify-content: center;">Update User - Student</a>
     <a href="admin_course_display.php" class="btn" style="display: flex; justify-content: center;">Update Course</a> -->
     <!-- <a href="ProfessorImport.php" class="btn" style="display: flex; justify-content: center;">Import file - Professsor</a>
     <a href="StudentImport.php" class="btn" style="display: flex; justify-content: center;">Import file - Student</a>
     <a href="CourseImport.php" class="btn" style="display: flex; justify-content: center;">Import file - Course</a> -->
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

<?php
}
else {
    echo "404: Sorry this page cannot be found.";
}
?>



</body>
</html>