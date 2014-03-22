<?php 
    // enable sessions
    session_start();

    // delete cookies, if any
    setcookie("user", "", time() - 3600);
    setcookie("pass", "", time() - 3600);

    // log user out
    setcookie(session_name(), "", time() - 3600);
    session_destroy();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <?php include('includes/style.php');?>
    <title>POTY-Log Out</title>
  </head>
  <body>
    <h1 class="header">You are logged out!</h1>
    <hr />
    <p style="text-align:center"><a href="index.php">home</a></p>
  </body>
</html>
