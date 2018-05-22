<?php
session_start();

   
   setcookie("student_login_cookie", "", time()-3600,"/");
   
   session_destroy();
   echo 'You have successfully logged out';
   header('Refresh: .5; URL = student_login.html');


?>
   
