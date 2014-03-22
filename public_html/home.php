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
    
    $dom = simplexml_load_file("http://www.golfdigest.com/services/rss/feeds/gd_everything.xml");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php include('includes/style.php');?>
    	<title>POTY-Home</title>
  	</head>
  	<body>
		<?php include('includes/header_nav.php');?>
		<h3>Latest Headlines from Golf Digest</h3>
   		<table align="center">
   			<? 
       			$i=0;
       			foreach ($dom->channel->item as $item): 
       		?>
     		<tr>
       			<td align="center"><a href="<?= $item->link ?>"><?= htmlspecialchars($item->title) ?></a></td>
     		</tr>
    		<? 
    			$i++;
       			if ($i == 10) break;
       			endforeach 
       		?>
  		</table>
  	</body>
</html>