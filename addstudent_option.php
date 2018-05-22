<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin-Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<style>		
		#result {
			color: red;
		}
	</style>
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
			$('#loginForm').on('submit', function (e) {
				var username = $("#user_name").val();
				var password = $("#password").val();
				var dataString = 'username='+ username  + '&password=' + password;

				e.preventDefault();

				$.ajax({
					type: "POST",
					url: "admin_login_check.php",
					data:dataString,
					success: function(response){

						if(response.includes("Success")){
							
							window.location.href = 'admin_home_page.php';

						}else{

							$("#result").html(response);
						}
					},
					error: function(e) {

						alert(e.message);

					}
				});
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
							<li><a href="#">ABOUT</a>
								<ul>
									<li><a href="#">OUR HISTORY</a></li>
									<li><a href="#">OUR TEAM</a></li>
									<li><a href="#">FAQs</a></li>
								</ul>
							</li>							
							
							<li><a href="#">CONTACTS</a></li>
							<li class="w3-large"><a href="signout.php"><i class="glyphicon glyphicon-user"></i> Sign Out</a></li>
						</ul>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		</nav>
	</header>

	<!--=======content================================-->
	<div id="content">
		<div class="main-content-agile">
    <br><br>
    <p style="text-align: center;font-weight: bold;font-size: 30px;">Welcome <?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?></p>
    <div class="sub-main-w3">
    <a href="add_student.php" class="btn" style="display: flex; justify-content: center;">Manually Add Student</a>
    <a href="StudentImport.php" class="btn" style="display: flex; justify-content: center;">Student CSV import</a>
    

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