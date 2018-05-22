<!DOCTYPE html>
<html lang="en">
<head>
	<title>Professor-Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<style>		
		#result {
			color: red;
		}

		body {
			background-image: url("images/kean_3.jpg");
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
				var remember = $("#remember").val();
				var dataString = 'username='+ username  + '&password=' + password;
				

				e.preventDefault();

				$.ajax({
					type: "POST",
					url: "professor_login_check.php",
					data:dataString,
					success: function(response){

						if(response.includes("Success")){
							
							window.location.href = 'professor_home_page.php';

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
							<li class="current"><a href="Professor_login.php">HOME</a></li>
							<li><a href="#">ABOUT</a></li>
							<li><a href="Professor_login.php">PROFESSOR LOGIN</a></li>
							
							<li><a href="#">CONTACTS</a></li>
						</ul>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		</nav>
	</header>

	<!--=======content================================-->
	<div id="content">
		<div class="featured">
			<!--<div class="rslides_container zerogrid">
				<ul class="rslides" id="slider">
					<li><img src="images/kean_3.jpg" alt=""></li>
					<li><img src="images/kean_2.jpg" alt=""></li>
					<li><img src="images/kean_4.jpg" alt=""></li>
					<li><img src="images/slider-4.jpg" alt=""></li>
				</ul>
			</div>-->
		</div>

<?php
if(isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
}
?>
		<div class="main-content-agile">
			<div class="sub-main-w3">
				<h2 style="color: black">Sign In</h2>
				<div id="result"></div>
				<form id="loginForm" name="loginForm" action="professor_login_check.php" method="post">

					<label style="color: black;">Username</label>

					<div class="pom-agile">

						<span class="fa fa-user-o" aria-hidden="true"></span>
						<input placeholder="Username" name="username" id="user_name" class="user" type="text" required="" value="<?php if(isset($_COOKIE["professor_login"])) { echo $_COOKIE["professor_login"]; } ?>" >
					</div>

					<label style="color: black">Password</label>
					<div class="pom-agile">
						<span class="fa fa-key" aria-hidden="true" ></span>
						<input placeholder="Password" name="password" id="password" class="pass" type="password" required="" value="<?php if(isset($_COOKIE["professor_password"])) { echo $_COOKIE["professor_password"]; } ?>">
					</div>
					<div class="sub-w3l">
					<input type="checkbox" name="remember" id="remember" class="rem" <?php if(isset($_COOKIE["professor_login"])) { ?> checked <?php } ?> />
					<label style="color: black" for="remember-me">Remember me</label>
					<a style="color: black" href="forgotpassword.php">Forgot Password?</a>
					<div class="clear"></div>
					</div>



					<div class="sub-w3l">
				
						<div class="clear"></div>
					</div>
					<div class="right-w3l">
						<input type="submit" value="Sign-In">
					</div>

				</div>
			</div>  
		</form>
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


</body>
</html>