<?php 

  session_start();

  // $_SESSION['logged'] = false;
  session_destroy();

  header("location: ../loginForm.php");

?>