<!DOCTYPE html>
<html lang="en">
<head>
     <title>Professor-Report</title>
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
       
       select {
    width: 100%;
    padding: 16px 20px;
    border: solid;
    border-radius: 4px;
    background-color: #f1f1f1;
    height: 40px;
}
     </style>
     </head>
     <body>

     <?php if(isset($_COOKIE["member_login"])) { 
    //echo $_COOKIE["member_login"]; 
    ?>
          <?php 
     session_start();
     include 'dbconnection.php';
     if(isset($_COOKIE["logincheck"])) { 

          if(isset($_COOKIE["professor_login"])) { 
               $professor = $_COOKIE["professor_login"]; 
               //echo "$professor";
          $name = "$professor"."@kean.edu";
          //echo "$name";
     }
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
                    <li><a href="professor_login.php">PROFESSOR LOGIN</a></li>
                     <li><a href="professor_report_options.php">REPORT</a></li>
                    <li class="w3-large"><a href="signout2.php"><i class="glyphicon glyphicon-user"></i> SIGN OUT</a></li>
                </ul>
                    </div>
            </div>
        </div>
    </nav>
</header>

<div id="content">
  <div class="main-content-agile">
  <div class="sub-main-w3">
<?php

     $query2 = " SELECT * FROM Professor where Email_id='$name'";
    $result2 = mysqli_query($con,$query2);
    while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
          $firstname= $row['First_name'];
            $lastname= $row['Last_name'];
            $fullname= $firstname." ". $lastname;
           //echo "$fullname";
  }

  ?>
<br><br>
<form name="input" action="report.php" method="post" >
<div style="text-align: center;font-size: 30px; color: black; font-weight: bold;">
      View Reports -
      Period:
      </div>
      <br><br>
  <select style="font-size: 18px;color: black;" name='report_period'>
  <option value="all">all</option>
  <option value="past_week">past week</option>
  <option value="current_month">current month</option>
  <option value="past_month">past month</option>
  <option value="this_semester">this semester</option>
  
  </select>
  <br>
  <div style="text-align: center;font-size: 30px; color: black; font-weight: bold;">
  <br>
  Course ID
  <br><br>
  </div>
  <select style="font-size: 18px;color: black;" name='report_type'>

  <?php

  $query2 = " SELECT * FROM courses where Professor_name='$fullname'";
     $result2 = mysqli_query($con,$query2);
     while($profrow = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
            $row4= $profrow['Course_id'];
            $row5= $profrow['Course_Name'];
            $row6= $row4."-". $row5;
            echo "$row6";
            ?>     
          <option value="<?php echo "$row4";?>"> <?php echo "$row4";?></option>
          
  <?php
       }
  ?>
  
</select>
<br><br>
<input style="background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 24px;
    border: none;
    cursor: pointer; font-weight: bold; text-align: center;width: 120px; margin-left: 35%" type="submit" value="Submit">
</form>
</div>
</div>
</div>
<br>

<?php
}
?>
<footer>
<br>
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
<br>

     
<?php
}
else{
    echo "Not authorized to access this page without login";
}
?>


</html>