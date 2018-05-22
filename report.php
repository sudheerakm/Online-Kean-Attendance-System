<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Report</title>
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

     <style type="text/css">
        body
        {
            font-family: Arial;
            font-size: 10pt;
        }
        table
        {
            border: 1px solid black;
            border-collapse: collapse;
            margin-left: auto;
            margin-right: auto;
            width: 100%;
            
        }
        table th
        {
            background-color: #F7F7F7;
            color: #333;
            font-weight: bold;
            
        }
        table th, table td
        {
            padding: 5px;
            border: 1px solid black;
            
        }
    </style>
</head>
<body>
<?php
session_start();
include 'dbconnection.php';
$report_period = $_POST['report_period'];
$report_type = $_POST['report_type'];
if(isset($_COOKIE["member_login"])) { 
	
?>

<header>
<br>
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

<div id="content">
  <div class="main-content-agile">
  

<div style="font-size: 24px; text-align: center;text-align: center;color: black;">
<br>
<?php
echo "Report for course <b> $report_type </b> during period: <b>$report_period </b>";
?>
</div>

<table id="tblCustomers" cellspacing="0" cellpadding="0">
        <tr style="border-color: green; color: white;font-size: 24px;">
            <th>Date</th>
            <th>Student Name</th>
            <th>Course ID</th>
             <th>Status</th>
        </tr>
        <br>

        
<br>
<br>

<?php

if($report_period == 'all'){
$query2 = " SELECT * FROM Attendance_Sheet where Course_id='$report_type' order by Date asc";
}

else if($report_period == 'past_week'){
    $d = strtotime("-1 week");
    $date = date("Y-m-d H:i:s", $d);
    $query2 = " SELECT * FROM Attendance_Sheet where Course_id='$report_type' and Date> '$date' order by Date asc";
}

else if($report_period == 'current_month'){
    $month = date("m");
    $year = date("Y");
    $query2 = " SELECT * FROM Attendance_Sheet where Course_id='$report_type' and YEAR(Date)='$year' and MONTH(Date)= '$month' order by Date asc";
}

else if($report_period == 'past_month'){
    $d = strtotime("-1 month");
    $month = date("m", $d);

        if($month == '12'){
                $y = strtotime("-1 year");
                $year = date("Y" , $y);
            }
            else{
                $year = date("Y");
            }
$query2 = " SELECT * FROM Attendance_Sheet where Course_id='$report_type' and YEAR(Date)='$year' and MONTH(Date)= '$month' order by Date asc";
}

else if($report_period == 'this_semester'){
    $year = date("Y");
    $query2 = " SELECT * FROM Attendance_Sheet where Course_id='$report_type' and YEAR(Date)='$year' order by Date asc";
}


    $result2 = mysqli_query($con,$query2);

    while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
        $date = $row['Date'];
       $sid = $row['Student_Name'];
       $courseid = $row['Course_id'];
       $status = $row['Status'];


echo"
        <tr style=\"font-size:20px;padding:20px;margin-top:20px; color:black; border:black;\">
            <td>$date</td>
            <td>$sid</td>
            <td>$courseid</td>
            <td>$status</td>
        </tr>";
        }?>
    </table>
    <br/>
    <input style="background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 24px;
    border: none;
    cursor: pointer; font-weight: bold; text-align: center;width: 200px; margin-left: 25px;" type="button" id="btnExport" value="Export" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="table2excel.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            $("#btnExport").click(function () {
                $("#tblCustomers").table2excel({
                    filename: "Attendance_report.xls"
                });
            });
        });
    </script>
    <br><br>
</div>
</div>
</div>
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
</footer>

</body>

<?php
}
else{
	 echo "Not authorized to access this page without login";
}
?>
</html>
