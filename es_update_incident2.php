<body style="background-color:powderblue;"><?php
if(isset($_POST["s"]))
{
session_start();
$to=$_POST["to"];
$id=$_SESSION['id'];
$from=$_POST["from"];
$conn= new mysqli("localhost","root","","emergency");
$sql="Select des,loc,inc_date,inc_id from incident,caller where caller.caller_num=incident.caller_num and incident.op_id = $id and inc_date>='$from' and inc_date<='$to'" ;
$r=mysqli_query($conn,$sql);
if($r)
{
  echo "<form action=es_update3.php method=post><br>PICK THE INCIDENT<select name=inc_id>";
  while($row=mysqli_fetch_assoc($r))
  {
	if(isset($_POST["inc_id"]) && $_POST["inc_id"]==$row["inc_id"])
		echo "<option selected value=".$row["inc_id"].">".$row["des"]." (".$row["loc"].")";
	else
		echo "<option  value=".$row["inc_id"].">".$row["des"]." (".$row["loc"].")";
  }

  echo "</select><input type=hidden name=s value=1><input type=submit value=Confirm></form>";

}
else
  echo "FAIL";
}

echo "<a href=es_op_portal.php style=color:orange;font-size:130%><b><hr>GO BACK TO OPERATOR PORTAL<br><br>";?>
<br><a href=es_op_functions.php>Click to go back to functions</a>
