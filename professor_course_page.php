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
session_start();
include 'dbconnection.php';
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
                    <li><a href="index-1.html">ABOUT</a></li>
                    <li><a href="admin_login.html">ADMIN LOGIN</a></li>
                    <li class="w3-large"><a href="#"><i class="glyphicon glyphicon-user"></i> Sign Out</a></li>
                </ul>
				</div>
            </div>
        </div>
    </nav>
</header>

<!--=======content================================-->
<div id="content">
	<div class="featured">
		<div class="rslides_container zerogrid">
			<ul class="rslides" id="slider">
				<li><img src="images/kean_3.jpg" alt=""></li>
				<li><img src="images/kean_2.jpg" alt=""></li>
				<li><img src="images/kean_4.jpg" alt=""></li>
				<li><img src="images/slider-4.jpg" alt=""></li>
			</ul>
		</div>
    </div> 
   <!-- <div class="main-content-agile"> !-->
    <br><br>
    <p style="text-align: center;font-weight: bold;font-size: 30px;">Student List</p>
    <!--<div class="sub-main-w3">!-->
    <?php
   $course = $_GET["var"]; 
   echo "$course";
    $query = "SELECT * FROM students";
    $result = mysqli_query($con,$query);
    
    while($profrow = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $row1= $profrow['First_name'];
            $row2= $profrow['Last_name'];
            $row3= $row1." ".$row2;

            ?>
   <div style=" background-color: lightgrey;
    width: 300px;
    border: 25px solid green;
    padding: 25px;
    margin: 25px;">
    <br>
    <?php
    
    }

    echo "$row1";

    ?>
    <br>
    </div>
    
   <!--</div> !-->
   <!--</div> !-->
    


   <!-- insert code here !-->

	
	<br>  
</div>

<br>
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

</body>
</html>