<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
?>
<head>
     <title>Add-Student</title>
     <script>

 function validatePassword() {
    var pass1 = document.getElementById("password").value;
    var pass2 = document.getElementById("password2").value;


    if (pass1 != pass2) {
        alert("Passwords Do not match");
        document.getElementById("password").style.borderColor = "#E34234";
        document.getElementById("password2").style.borderColor = "#E34234";
        return false;
    }
    else {
        
        return true;
    }
}

function checkname()
{
 var name=document.getElementById( "username" ).value;
 

 if(name)
 {
   

  $.ajax({
  type: 'post',
  url: 'checkdata.php',
  data: {
   user_name:name,
  },
  success: function (response) {
   $( '#name_status' ).html(response);
    
   //alert(response);
   if(response =="OK")   
   {
   
    return true;  
          
   }
   else
   {
   
    return false; 
              
   }
  }
  });
 }
 
 else
 {
  $( '#name_status' ).html("");
   // alert("SHOULD always be the case if not typing");
  return false;
 }

}



function validateForm(){
        var a = validatePassword();
        var b;

        var namehtml=document.getElementById("name_status").innerHTML;
        

        if(namehtml=="OK")
        {
                b = true;
        }
        else
        {
                b = false;
        }



        if(a && b){
              
                return true;

        }
        else{
               
                return false;
        }
}

</script>

     <style>
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=password], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=number], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=email], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}


</style>
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
<body>

<?php
include 'dbconnection.php';
?>
<!--==============================header=================================-->

<?php if(isset($_COOKIE["Admin_login_cookie"])) { 
    //echo $_COOKIE["member_login"]; 
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

<!--=======content================================-->
<div id="content">
	

    <div class="main-content-agile">
    <br><br>
    <p style="text-align: center;font-weight: bold;font-size: 30px;">Add Student</p>
    <div class="sub-main-w3">

    <div style="text-align: center; color: red; font-size: 24px; font-weight: bold;">
   <?php 
  
    if ( isset($_SESSION['success']) && $_SESSION['success'] == 1)
{
    
     echo "Student account created";
     unset($_SESSION['success']);
} 
elseif(isset($_SESSION['success']) && $_SESSION['success'] == 0){
  echo "Something went wrong please try again";
  unset($_SESSION['success']);
} 

elseif(isset($_SESSION['success']) && $_SESSION['success'] == 3){
  echo "Password doesn't match please try again";
  unset($_SESSION['success']);
}  

elseif(isset($_SESSION['success']) && $_SESSION['success'] == 2){
  echo "Student with given Student ID or Email ID already exists ";
  unset($_SESSION['success']);
} 
elseif(isset($_SESSION['success']) && $_SESSION['success'] == 4){
  echo "Please enter the valid Kean email id";
  unset($_SESSION['success']);
}  
 ?>
</div>
<br>

    <form name="form2" id="ss" method="post" onsubmit= " return validateForm();" action="student_insert_sucess.php">
        First name:<br>
        <input type="text" name="firstname" value="" required="required">
        <br>
        Last name:<br>
        <input type="text" name="lastname" value="" required="required">
        <br>
        Department:<br>
        <input type="text" name="department" value="" required="required">
        <br>
        Kean Email_Id:<br>
        <input type="email" name="email_id" value="" required="required">
        <br>
        Kean Student ID:<br>
        <input type="text" name="studentid" value="" required="required">
        <br>
        Password:<br>
        <input type="password" name="password" value="" required="required">
        <br>
        Retype Password:<br>
        <input type="password" name="password2" value="" required="required">
        <br><br>
        <input type="submit" value="submit" name="submit">
    </form> 


     <!--<a href="#" class="btn" style="display: flex; justify-content: center;">Import file - Course</a> !-->
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
else{
    echo "Not authorized to access this page without login";
}
?>

</body>
</html>