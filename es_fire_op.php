<body style="background-color:powderblue;"><center><img src=emergency_service.png class="center" width="250" height="120"></center>
<?php
session_start();
$conn = new mysqli("localhost", "root","", "emergency");
$sql="select fname,lname,op_id from operator where cent_id= ".$_SESSION['id'];
$r=mysqli_query($conn,$sql);
echo "<form action=es_fire_op.php method=POST>
<h1>Choose
<select name=op_id>";
while($row=mysqli_fetch_assoc($r))
{
  if(isset($_POST["op_id"]) && $_POST["op_id"]==$row["op_id"])
		echo "<option selected value=".$row["op_id"].">".$row["fname"]." ".$row["lname"];
	else
		echo "<option value=".$row["op_id"].">".$row["fname"]." ".$row["lname"];
}
echo "</select>
<input type=submit name=submit value=\"Remove Operator\">";
if(isset($_POST["op_id"]))
{
  $op_id=$_POST["op_id"];
  $sql="delete from operator where op_id =$op_id";
  $r=mysqli_query($conn,$sql);
  if($r)
  echo" <br>OPERATOR RECORD DELETED!";
  else {
     echo" <br>SQL ERROR!";
  }

}
?>
<h2>
<br><a href=es_man_portal.php >Click to go back to portal page!</a>
<br><a href=es_op_functions.php>Click to go back to functions</a>
