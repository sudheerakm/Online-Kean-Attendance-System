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





 $rowperpage = 5;
    $row = 0;
    // Previous Button
    
    // generating orderby and sort url for table header
    function sortorder($fieldname){
        $sorturl = "?order_by=".$fieldname."&sort=";
        $sorttype = "asc";
        if(isset($_GET['order_by']) && $_GET['order_by'] == $fieldname){
            if(isset($_GET['sort']) && $_GET['sort'] == "asc"){
                $sorttype = "asc";
            }
        }
        $sorturl .= $sorttype;
        return $sorturl;
    }






$report_period = $_POST['report_period'];
$report_type = $_POST['report_type'];
if(isset($_COOKIE["member_login"])) { 


$cookie_name1 = "period";
$cookie_value1 = "$report_period";
setcookie($cookie_name1, $cookie_value1, time() + (3600), "/"); // 86400 = 1 day

$cookie_name2 = "type";
$cookie_value2 = "$report_type";
setcookie($cookie_name2, $cookie_value2, time() + (3600), "/"); // 86400 = 1 day

	
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




   <th>S.no</th>
   <th ><a href="<?php echo sortorder('Date'); ?>" class="sort">Date</a></th>
  <th ><a href="<?php echo sortorder('Student_Name'); ?>" class="sort">Student Name</a></th>
  <th ><a href="<?php echo sortorder('Course_id'); ?>" class="sort">Course ID</a></th>
<th ><a href="<?php echo sortorder('Status'); ?>" class="sort">Status</a></th>




            <!--<th>Date</th>
            <th>Student Name</th>
            <th>Course ID</th>
             <th>Status</th>-->
        </tr>
        <br>

        
<br>
<br>

<?php


if(!isset($_COOKIE[$cookie_name1])) {
    //echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "Cookie '" . $cookie_name1 . "' is set!<br>";
   echo "Value is: " . $_COOKIE[$cookie_name1];
  $report_period=$_COOKIE[$cookie_name1];
}

if(!isset($_COOKIE[$cookie_name2])) {
    //echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "Cookie '" . $cookie_name2 . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name2];
  $report_type=$_COOKIE[$cookie_name2];
}
// count total number of rows
        $sqlquery = "SELECT COUNT(*) AS cntrows FROM 2017F_sivaramh.Attendance_Sheet";
        $resultquery = mysqli_query($con,$sqlquery);
        $fetchresult = mysqli_fetch_array($resultquery);
        $allcount = $fetchresult['cntrows'];


        // selecting rows


        $orderby = " ORDER BY Date desc ";
        if(isset($_GET['order_by']) && isset($_GET['sort'])){
            $orderby = ' order by '.$_GET['order_by'].' '.$_GET['sort'];
        }



//if($report_period == 'all'){
$query2 = " SELECT * FROM Attendance_Sheet where Course_id='$report_type'".$orderby;
//}

/*else if($report_period == 'past_week'){
    $d = strtotime("-1 week");
    $date = date("Y-m-d H:i:s", $d);
    $query2 = " SELECT * FROM Attendance_Sheet where Course_id='$report_type' and Date> '$date'".$orderby;
}

else if($report_period == 'current_month'){
    $month = date("m");
    $year = date("Y");
    $query2 = " SELECT * FROM Attendance_Sheet where Course_id='$report_type' and YEAR(Date)='$year' and MONTH(Date)= '$month'".$orderby;
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
$query2 = " SELECT * FROM Attendance_Sheet where Course_id='$report_type' and YEAR(Date)='$year' and MONTH(Date)= '$month'".$orderby;
}

else if($report_period == 'this_semster'){
    $year = date("Y");
    $query2 = " SELECT * FROM Attendance_Sheet where Course_id='$report_type' and YEAR(Date)='$year'".$orderby;
}*/


    $result2 = mysqli_query($con,$query2);
     $sno = $row + 1;
    while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
        $date = $row['Date'];
       $sid = $row['Student_Name'];
       $courseid = $row['Course_id'];
       $status = $row['Status'];
?>


        <tr style=\"font-size:20px;padding:20px;margin-top:20px; color:black; border:black;\">
             <td align='center'><?php echo $sno; ?></td>
                <td align='center'><?php echo $date; ?></td>
                <td align='center'><?php echo $sid; ?></td>
                <td align='center'><?php echo $courseid ?></td>
                <td align='center'><?php echo $status; ?></td>
        </tr>
        <?php
        $sno ++;
        }?>
    </table>
    <br/>
    <form method="post" action="">
        <div id="div_pagination">
            <input type="hidden" name="row" value="<?php echo $row; ?>">
            <input type="hidden" name="allcount" value="<?php echo $allcount; ?>">
            <input type="submit" class="button" name="but_prev" value="Previous">
            <input type="submit" class="button" name="but_next" value="Next">
        </div>
    </form>
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
