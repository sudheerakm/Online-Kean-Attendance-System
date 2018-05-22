<?php
   session_start();

   unset($_SESSION['row']);
   unset($_SESSION['success']);
   setcookie("Admin_login_cookie", "", time()-3600,"/");
   session_destroy();
   echo 'You have successfully logged out';
   header('Refresh: .5; URL = admin_login.php');
?>
