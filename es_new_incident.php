</a><body style="background-color:powderblue;"><?php
session_start();
echo "<center><img src=emergency_service.png class=\"center\" width=\"250\" height=\"120\"></center>";
$id=$_SESSION['id'];
$conn = new mysqli("localhost", "root","", "emergency");
$sql="select cent_id from operator where op_id= ".$_SESSION['id'];
$r=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($r);
$_SESSION['cid']=$row["cent_id"];
echo "STEP 1: <br>";
echo "<form action=es_new_inc_2.php method=POST>
<h2>
LOCATION<input type=text id=loc name=loc required></input>
<br>
DESCRIPTION<input type=text id=desc name=desc required></input>
<br>FULL NAME
<input type=text id=cname name=cname required></input>
<br>
<input type=submit value=Next >
</form>
";
?>
<br><a href=es_op_portal.php>Click to go back to portal</a>
