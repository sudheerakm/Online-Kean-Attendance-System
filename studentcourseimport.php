 <!DOCTYPE html>
<html lang="en">
<head>
 <title>Admin-Student-Course-Import</title>
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
  input[type=file] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
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

/*div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
*/


</style>
</head>
<body>

<?php if(isset($_COOKIE["Admin_login_cookie"])) { 
    //echo $_COOKIE["member_login"]; 
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
	<!-- <div class="featured">
		<div class="rslides_container zerogrid">
			<ul class="rslides" id="slider">
				<li><img src="images/kean_3.jpg" alt=""></li>
				<li><img src="images/kean_2.jpg" alt=""></li>
				<li><img src="images/kean_4.jpg" alt=""></li>
				<li><img src="images/slider-4.jpg" alt=""></li>
			</ul>
		</div>
  </div> -->
  <br/>

  <div class="main-content-agile">
    <br><br> 
    <p style="text-align: center;font-weight: bold;font-size: 30px;">Student - Course Import</p>
    <div class="sub-main-w3">

      <div style="text-align: center; color: red; font-size: 24px; font-weight: bold;">

      </div>
      <br>

      <?php
      include_once 'dbconfig.php';
       $message = "";

      if(isset($_POST['submit'])){
        if($_FILES['csv_data']['name']){

          $arrFileName = explode('.',$_FILES['csv_data']['name']);
          if($arrFileName[1] == 'csv'){
            $handle = fopen($_FILES['csv_data']['tmp_name'], "r");
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

              $Sid = mysqli_real_escape_string($conn,$data[0]);                  
              $Course_id = mysqli_real_escape_string($conn,$data[1]);
              $Semester = mysqli_real_escape_string($conn,$data[2]);
              $year = mysqli_real_escape_string($conn,$data[3]);


              $import="INSERT into student_course(Sid,Course_id,Semester,year) values('$Sid','$Course_id','$Semester','$year');";


              $conn = new mysqli($servername, $username, $password, $dbname);  
              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }


              if ($conn->query($import) === TRUE) {
                $message = '<span style="color:green;text-align:center;font-weight:bold;">Successfully Imported data</span>';
                // echo "<script type='text/javascript'>alert('$message');</script>";
              } else {
                $error= "Error: " . $import . "<br>" . $conn->error;
                 // $message = '<span style="color:red;text-align:center;">',$error,'</span>';
                // echo "<script type='text/javascript'>alert('$message');</script>";
              }
            }
            fclose($handle);
          }
        }
      }
      ?>
      <p name="message"><?php echo $message; ?> </p>
      <form method='POST' enctype='multipart/form-data'>
        Upload csv:<br>
        <input type='file' name='csv_data'>

        <br><br>
        <input type='submit' name='submit' value='Upload CSV'>
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
else{
    echo "Not authorized to access this page without login";
}
?>

</body>
</html>