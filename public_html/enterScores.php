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

    // if all text form fields are submitted
	if($_POST["date"] && $_POST["course"] && $_POST["player"])
	{
		// if at least nine holes are posted
        if($_POST["hole1"] && $_POST["hole2"] && $_POST["hole3"] && $_POST["hole4"] && $_POST["hole5"] && $_POST["hole6"] && $_POST["hole7"] && $_POST["hole8"] && $_POST["hole9"])
        {
			// if hole score are numbers
			if(is_numeric($_POST["hole1"]) && is_numeric($_POST["hole2"]) && is_numeric($_POST["hole3"]) && is_numeric($_POST["hole4"]) && is_numeric($_POST["hole5"]) && is_numeric($_POST["hole6"]) && is_numeric($_POST["hole7"]) && is_numeric($_POST["hole8"]) && is_numeric($_POST["hole9"]) && is_numeric($_POST["hole10"]) && is_numeric($_POST["hole11"]) && is_numeric($_POST["hole12"]) && is_numeric($_POST["hole13"]) && is_numeric($_POST["hole14"]) && is_numeric($_POST["hole15"]) && is_numeric($_POST["hole16"]) && is_numeric($_POST["hole17"]) && is_numeric($_POST["hole18"]))
			{
				// connect to database
				if (($connection = mysql_connect(HOST, USER, PASS)) === FALSE)
					die("Could not connect to database");
		
				// select database
				if (mysql_select_db(DB, $connection) === FALSE)
					die("Could not select database");
				
				// prepare SQL        	
				$sql = sprintf("INSERT INTO scores (date,course,player,h1,h2,h3,h4,h5,h6,h7,h8,h9,h10,h11,h12,h13,h14,h15,h16,h17,h18) VALUES ('%s','%s','%s','%u','%u','%u','%u','%u','%u','%u','%u','%u','%u','%u','%u','%u','%u','%u','%u','%u','%u')",
					$_POST["date"],
					mysql_real_escape_string($_POST["course"]),
					mysql_real_escape_string($_POST["player"]),
					$_POST["hole1"],
					$_POST["hole2"],
					$_POST["hole3"],
					$_POST["hole4"],
					$_POST["hole5"],
					$_POST["hole6"],
					$_POST["hole7"],
					$_POST["hole8"],
					$_POST["hole9"],
					$_POST["hole10"],
					$_POST["hole11"],
					$_POST["hole12"],
					$_POST["hole13"],
					$_POST["hole14"],
					$_POST["hole15"],
					$_POST["hole16"],
					$_POST["hole17"],
					$_POST["hole18"]);
				
				// execute query
				$result = mysql_query($sql);
				if ($result === FALSE)
					die("Could not query database");
				else{
					header("Location: http://poty.netii.net/home.php");
					exit;
				}
 			}
			else print("Hole scores must be numbers"); 
        }
		else print("Must post at least 9 holes"); 
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
  	<head>
		<script language="Javascript">
		function show18()
			{
				var backHoles = document.getElementsByClassName('18');
				if(document.getElementById("radio18").checked)
				{
					for(var i=0; i<backHoles.length; i++) { 
						backHoles[i].style.visibility='visible'
					}
				}
				else
				{
					for(var i=0; i<backHoles.length; i++) { 
						backHoles[i].style.visibility='hidden'
					}
				}
			}
		</script>
		<?php include('includes/style.php');?>
    	<title>POTY-Post Scores</title>
  	</head>
  	<body>
		<?php include('includes/header_nav.php');?>
    	<form action="<? echo $_SERVER["PHP_SELF"]; ?>" method="post">
      		<table align="center">
        		<tr>
					<td colspan="11" align="center">POTY round<input type="radio" name="isPoty">| Standard round<input type="radio" name="isPoty" checked></td>
				</tr>
				<tr>
          			<td></td>
					<td>Holes played: <input type="radio" name="numHoles" onclick="return show18()">9<input type="radio" name="numHoles" id="radio18" onclick="return show18()" checked>18</td>
					<td>Hole 1</td>
					<td>Hole 2</td>
					<td>Hole 3</td>
					<td>Hole 4</td>
					<td>Hole 5</td>
					<td>Hole 6</td>
					<td>Hole 7</td>
					<td>Hole 8</td>
					<td>Hole 9</td>
				</tr>
				<tr>
					<td align="right">Date:</td>
        			<td><input name="date" type="date" /></td>
					<td><input maxlength="2" size="5" name="hole1" type="text" /></td>
					<td><input maxlength="2" size="5" name="hole2" type="text" /></td>
					<td><input maxlength="2" size="5" name="hole3" type="text" /></td>
					<td><input maxlength="2" size="5" name="hole4" type="text" /></td>
					<td><input maxlength="2" size="5" name="hole5" type="text" /></td>
					<td><input maxlength="2" size="5" name="hole6" type="text" /></td>
					<td><input maxlength="2" size="5" name="hole7" type="text" /></td>
					<td><input maxlength="2" size="5" name="hole8" type="text" /></td>
					<td><input maxlength="2" size="5" name="hole9" type="text" /></td>
				</tr>
				<tr>
					<td align="right">Course:</td>
					<td><input placeholder="i.e. Eagle Rock" name="course" type="text" /></td>
					<td class="18">Hole 10</td>
					<td class="18">Hole 11</td>
					<td class="18">Hole 12</td>
					<td class="18">Hole 13</td>
					<td class="18">Hole 14</td>
					<td class="18">Hole 15</td>
					<td class="18">Hole 16</td>
					<td class="18">Hole 17</td>
					<td class="18">Hole 18</td>
				</tr>
				<tr>
					<td align="right">Player(First Name Last Name):</td>
					<td><input placeholder="i.e. Jason Plassman" name="player" type="text" /></td>
					<td class="18"><input maxlength="2" size="5" name="hole10" type="text" /></td>
					<td class="18"><input maxlength="2" size="5" name="hole11" type="text" /></td>
					<td class="18"><input maxlength="2" size="5" name="hole12" type="text" /></td>
					<td class="18"><input maxlength="2" size="5" name="hole13" type="text" /></td>
					<td class="18"><input maxlength="2" size="5" name="hole14" type="text" /></td>
					<td class="18"><input maxlength="2" size="5" name="hole15" type="text" /></td>
					<td class="18"><input maxlength="2" size="5" name="hole16" type="text" /></td>
					<td class="18"><input maxlength="2" size="5" name="hole17" type="text" /></td>
					<td class="18"><input maxlength="2" size="5" name="hole18" type="text" /></td>
				</tr>
				<tr>
					<td></td>
				  	<td><input type="submit" value="Post Scores" /></td>
				</tr>
			</table>      
		</form>
  	</body>
</html>