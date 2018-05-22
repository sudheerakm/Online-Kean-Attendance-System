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
   input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }
  input[type=date], select {
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
 #customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>
</head>
<?php
$cookie_name="student_login_cookie";
if(isset($_COOKIE[$cookie_name])){
  include "dbconfig.php";
  $myLoginId= $_COOKIE[$cookie_name];
      $myCourseId= $_POST['Course'];
      $mySemester= $_POST['Semester'];
      $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }


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
          <li class="w3-large"><a href="student_signout.php"><i class="glyphicon glyphicon-user"></i> Sign Out</a></li>
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
    <p style="text-align: center;font-weight: bold;font-size: 30px;">Student Attendance report</p>
    <br/>
    <!-- <div class="sub-main-w3"> -->

      <div style="text-align: center; color: red; font-size: 24px; font-weight: bold;">

      </div> 
        
        
        <?php
        $results = mysqli_query($conn,"SELECT Sid FROM students where Email_id='$myLoginId'");
        $sid_row= mysqli_fetch_assoc($results);
        $Sid=$sid_row['Sid'];
        
        $semester_results = mysqli_query($conn,"SELECT Semester FROM student_course where Sid='$Sid' and Course_id='$myCourseId'");
        $semester_row= mysqli_fetch_assoc($semester_results);
        $semester=$semester_row['Semester'];
        
        if($semester==$mySemester){
        $Attendance_results = mysqli_query($conn,"select  Course_id,Status,count(Status) as Days from Attendance_Sheet where Sid='$Sid' and Course_id='$myCourseId'group by Status;");
        if($Attendance_results){
  if ($Attendance_results->num_rows > 0) {
  // echo "<p align=center><b>The Attendance table<b></p>";   
  ?>
  
  <table id ="customers" align ='center' border="1">
   <thead>
   <tr>
      <th><b>Course_ID</b></th>
      <th><b>Status</b></th>
      <th><b>Number_of_Days</b></th>      
    </tr>
    </thead>
    <tbody>
    <?php
     while( $row = mysqli_fetch_array($Attendance_results) ){
          echo "<tr><td>{$row['Course_id']}</td>
          <td>{$row['Status']}</td>
          <td>{$row['Days']}</td>
          </tr>\n";
        }    
      }

      else{
          echo"<br>No records in the database.\n";
          mysqli_free_result($Attendance_results);
    
      }
  }
}
  else{ 
      echo"<br>No records matches for the searching criteria.\n";   
      }
      mysqli_close($conn);
    ?>
    </tbody>
  </table> 

    <!-- </div> -->
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
  echo("Please login as student first");
}
?>
</body>
</html>