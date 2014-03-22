<?php
    // enable sessions
    session_start();

	if($_SESSION["authenticated"])
    {
        header("Location: http://poty.netii.net/home.php");
        exit;
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
	  <?php include('includes/style.php');?>
    <title>POTY</title>
  </head>
  <body>
  <div style="text-align:right"><a href="login.php">login</a> / <a href="register.php">register</a></div>
  <h1 id="header">Welcome to the official Plassman POTY site</h1>
  <hr />
  </body>
</html>