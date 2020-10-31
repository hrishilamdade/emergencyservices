<center><img src=emergency_service.png class="center" width="250" height="120"></center>
<form action=es_edit_operator_rating.php method=POST>
<h1>Choose
  <style>
  table, th, td {
    border: 1px solid black;
  }
  </style>
<select name=op_id>
<?php
session_start();
$conn = new mysqli("localhost", "root","", "emergency");
$sql="select fname,lname,op_id from operator where cent_id= ".$_SESSION['id'];
$r=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($r))
{
  if(isset($_POST["op_id"]) && $_POST["op_id"]==$row["op_id"])
		echo "<option selected value=".$row["op_id"].">".$row["fname"]." ".$row["lname"];
	else
		echo "<option value=".$row["op_id"].">".$row["fname"]." ".$row["lname"];
}
?>
</select>
<input type=submit name=submit value="show">
<?php
if(isset($_POST["op_id"]))
{
  $conn = new mysqli("localhost", "root","", "emergency");
  $sql="select fname,lname,rating from operator where op_id=".$_POST["op_id"];
  $r=mysqli_query($conn,$sql);
  $op_id=$_POST["op_id"];
  echo "<form action=es_edit_operator_rating.php method=POST>
  <table style=75%>
  <tr><th>First name<th>Last Name<th>Current Rating</tr>";
  $row=mysqli_fetch_assoc($r);
    $fname=$row["fname"];
    $lname=$row["lname"];
    $rat=$row["rating"];
    if(!isset($_POST["rating"]))
    {
    echo "
    <tr><th>".$fname." <th>".$lname." <th><input type=number name=rating id=rating value=".$rat."><input type=submit value=Save></input></tr>";
  }
  if(isset($_POST["rating"]))
  {
    $rat=$_POST["rating"];
    $sql="update operator set rating = ".$_POST["rating"]." where op_id=".$op_id;
    $r=mysqli_query($conn,$sql);
    echo "
    <tr><th>".$fname." <th>".$lname." <th><input type=number name=rating id=rating value=".$rat."><input type=submit value=Save></input></tr>";
  }
}


?>
