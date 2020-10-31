<html><body style="background-color:powderblue;">
	<head>
		<?php session_start(); ?>
<h1 >PICK DATE RANGE OF INCIDENT </h1>
<form action= es_update_incident2.php method=POST>
<label>From
<input style="color:black;" type=date name=from></label>
<label>To<input style="color:black;" type=date name=to></label>
<BR>
<BR>
	<input type=hidden name=s id=s value=1></input>
 <input type='submit' name=s value=show></input>
<br><hr><a href=es_op_portal.php >Click to go back to portal!</a>
<br><a href=es_op_functions.php>Click to go back to functions</a>
