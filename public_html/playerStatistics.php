<?php
    // get MySQL login data
    require "../private/include.php";

    // enable sessions
    session_start();

    if(!$_SESSION["authenticated"])
    {
        header("Location: http://poty.netii.net/index.php");
        exit;
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
  	<head>
		<?php include('includes/style.php');?>
    	<title>POTY-Player Statistics</title>
  	</head>
  	<body>
		<?php include('includes/header_nav.php');?>
    	<form action="<? echo $_SERVER["PHP_SELF"]; ?>" method="post">
      		<table align="center">
        		<tr>
					<td align="center"><b>Player</b></td>
					<td align="center"><b>Handicap</b></td>
						<td align="center"><b>YTD Average</b></td>
				</tr>
				<tr>
					<td align="center">Trevor</td>
        			<td align="center">Scratch</td>
					<td align="center">75.00</td>
				</tr>
			</table>      
		</form>
  	</body>
</html>