<body style="background-color:powderblue;"><?php
session_start();
echo "<center><img src=emergency_service.png class=\"center\" width=\"250\" height=\"120\"></center>";
if($_SERVER['REQUEST_METHOD']=="POST")
{
$id=$_SESSION['id'];
$cid=$_SESSION['cid'];
$name=$_POST["cname"];
$loc=$_POST["loc"];
$des=$_POST["desc"];
$conn = new mysqli("localhost", "root","", "emergency");
$sql="insert into caller values(caller_num,'$cid','$name','$des','$loc')";
$r=mysqli_query($conn,$sql);
if($r)
{
echo "<h3>1st Details Saved. Name of caller: ".$name."</h3><br><h1>STEP 2</h1>";
$conn = new mysqli("localhost", "root","", "emergency");
$sql="select caller_num from caller where caller_name = '$name'";
$r=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($r);
$_SESSION['cnum']=$row["caller_num"];
echo" Caller Number : ".$_SESSION['cnum'];

echo "<br><form action=inc_new3.php method=post>
<br>Status :<input type=text id=status name=status required> </input>
<br>Date :<input type=date id=date name=date required></input>
<br>Time :<input type=time id=time name=time required></input>
<input type=hidden name=s id=s value=1>
<br> <input type=submit value=next></form>";
}
else {
  echo "<h2>Fail! Go back<br> <a href=es_new_incident.php style=color:green;font-size:130%><b>REPORT NEW INCIDENT </b> <br><br>";
}
}
?>
<body style="background-color:powderblue;">
