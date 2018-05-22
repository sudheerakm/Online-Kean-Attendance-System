<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include 'dbconnection.php';
?>
<head>
     <title>Student-Course</title>
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
    <p style="text-align: center;font-weight: bold;font-size: 30px;">Add Student to Course</p>

    <div class="sub-main-w3">
   
   <div style="text-align: center; color: red; font-size: 24px; font-weight: bold;">
   <?php 
  
    if ( isset($_SESSION['success']) && $_SESSION['success'] == 1)
{
    
     echo "Course is successfully added under the student";
     unset($_SESSION['success']);
} 
elseif(isset($_SESSION['success']) && $_SESSION['success'] == 0){
  echo "Something went wrong please try again";
  unset($_SESSION['success']);
} 

elseif(isset($_SESSION['success']) && $_SESSION['success'] == 2){
  echo "Student already added to this course";
  unset($_SESSION['success']);
}  
 ?>
</div>
  
  <br>

  <?php
    //$query = " SELECT Student_id FROM students";
  $query = " SELECT Email_id FROM students order by Sid";
    $result = mysqli_query($con,$query);
    $query2 = " SELECT Course_id FROM courses order by Course_id";
    $result2 = mysqli_query($con,$query2);
    ?>

  <form name="form1" id="ff" method="post" onsubmit= " return validateForm();" action="student_course_insert.php">
	 
Student Email ID<br>
        <select name="studentid">
        <?php
        while($profrow = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $row1= $profrow['Email_id'];
            //$row2= $profrow['Last_name'];
            //$row3= $row1." ".$row2;
         // $row1= $profrow['Sid'];
        echo " 
        <option value =".$row1."> ".$row1."</option>";
        }
        ?>
        </select>
 Student name<br>
        <select name="student">
        <?php
        $query3 = " SELECT First_name,Last_name FROM students order by Sid";
        $result4 = mysqli_query($con,$query3);
        while($profrow4 = mysqli_fetch_array($result4, MYSQLI_ASSOC)){
        	$row4= $profrow4['First_name'];
        	$row5= $profrow4['Last_name'];
        	$row6= $row4." ".$row5;
        //echo " <option value =".$row6."> ".$row6."</option>";
        	echo "<option value='".$row6."'>" . $row6. "</option>";
        }
        ?>
        </select>
        <br>
        Course ID<br>
        <select name="courseid">
        <?php
        while($prof2row = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
            $row4= $prof2row['Course_id'];
            //$row5= $prof2row['Course_Name'];
            //$row6= $row4."-". $row5;
        //echo "<option value =".$row4."> ".$row4."</option>";
            echo "<option value='".$row4."'>" . $row4. "</option>";
        }
        ?>
        </select>

        <input type='hidden' value='<?php echo "$row4";?>' name="firstname">
        <input type='hidden' value='<?php echo "$row5";?>' name="secondname">

        Course<br>
        <select name="plastname">
        <?php
        $query10 = " SELECT Course_Name FROM courses order by Course_id";
        $result10 = mysqli_query($con,$query10);
        while($prof10row = mysqli_fetch_array($result10, MYSQLI_ASSOC)){
        	//$row10= $prof2row['Course_id'];
        	$row10= $prof10row['Course_Name'];
        	//$row6= $row4."-". $row5;
        echo " 
        
        <option value =".$row10."> ".$row10."</option>";
        }
        ?>
        </select>

        Year :
        <select id="year" name="yearly">
            
        <option value="2018">2018</option>
         <option value="2019">2019</option>
          <option value="2020">2020</option>
           <option value="2021">2021</option>
        </select>

        Semster 
        <input type="text" name="Semster">

        <input type='submit' value='Submit' name="submit">
    </form> 

<form action="studentcourseimport.php">
    <input type="submit" value="Import Student to Course" />
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