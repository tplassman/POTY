<?php
	// get MySQL login data
    require "../private/include.php";

    // enable sessions
    session_start();

    // if all form fields were submitted, check them
	if($_POST["user"] && $_POST["email"] && $_POST["pass"] && $_POST["passCheck"])
	{
		// if both password fields are the same
        if($_POST["pass"]==$_POST["passCheck"])
        {
        	// connect to database
        	if (($connection = mysql_connect(HOST, USER, PASS)) === FALSE)
            	die("Could not connect to database");
    
        	// select database
        	if (mysql_select_db(DB, $connection) === FALSE)
            	die("Could not select database");
            
            // check if username already exists
            //if(mysql_query(sprintf("SELECT 1 FROM players WHERE user='%s'",mysql_real_escape_string($_POST["user"])))){
            //	die("username already exist");
			//}
			
            // prepare SQL        	
        	$sql = sprintf("INSERT INTO players (user,pass,email) VALUES ('%s',PASSWORD('%s'),'%s')",
              	mysql_real_escape_string($_POST["user"]),
              	mysql_real_escape_string($_POST["pass"]),
              	mysql_real_escape_string($_POST["email"]));
        	
        	// execute query
        	$result = mysql_query($sql);
        	if ($result === FALSE)
            	die("Could not query database");
 			else{
        		// remember that user's logged in
            	$_SESSION["authenticated"] = TRUE;
            	
            	$_SESSION['user']=$_POST["user"];

            	header("Location: http://poty.netii.net/home.php");
            	exit;
 			}
        }
        else print "passwords do not match";
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <?php include('includes/style.php');?>
    <title>POTY-Register</title>
  </head>
  <body>
    <form action="<? echo $_SERVER["PHP_SELF"]; ?>" method="post">
      <table>
        <tr>
          <td>Username:</td>
          <td><input name="user" type="text" /></td>
        </tr>
        <tr>
          <td>Email:</td>
          <td><input name="email" type="text" /></td>
        </tr>
        <tr>
          <td>Password:</td>
          <td><input name="pass" type="password" /></td>
        </tr>
        <tr>
          <td>Re-Enter Password:</td>
          <td><input name="passCheck" type="password" /></td>
        </tr>
        <tr>
          <td></td>
          <td><input type="submit" value="Log In" /></td>
        </tr>
      </table>      
    </form>
  </body>
</html>