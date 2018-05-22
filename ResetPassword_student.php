<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
?>
<head>
     <title>ResetPassword</title>
     
     <style>
#result {
      color: red;
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
input[type=password], select {
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
          $('#form2').on('submit', function (e) {
        var email_id = $("#email_id").val();
        var password = $("#password").val();
        var password2 = $("#password2").val();
        var dataString = 'email_id='+ email_id  + '&password=' + password + '&password2=' + password2;

        e.preventDefault();

        $.ajax({
          type: "POST",
          url: "UpdatePassword_Student.php",
          data:dataString,
          success: function(response){

            if(response.includes("Success")){
              
              $("#result").html(response);

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

<?php
include 'dbconnection.php';
?>
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
                    <li><a href="admin_login.php">ADMIN LOGIN</a></li>
                    <li class="w3-large"><a href="signout.php"><i class="glyphicon glyphicon-user"></i> Sign Out</a></li>
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

    <div class="main-content-agile">
    <br><br>
    <p style="text-align: center;font-weight: bold;font-size: 30px;">Reset password</p>
    <div class="sub-main-w3">

    <div style="text-align: center; color: red; font-size: 24px; font-weight: bold;">
   
</div>
<br>
    <div id="result"></div>
    <form name="form2" id="form2" method="post"  action="UpdatePassword_Student.php">
    Email:<br>
               <?php echo '
<input type="email" name="email_id" id = "email_id" value="';

if (isset($_GET["email_id"])) {

    echo $_GET["email_id"];

}

    echo '" />';
    ?>
<br>
        New Password:<br>
        <input type="password" name="password" id ="password" value="">
        <br>
        Retype Password:<br>
        <input type="password" name="password2" id ="password2" value="">
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
</body>
</html>