<body style="background-color:powderblue;">
  <?php
session_start();
echo "<body style=\"background-color:powderblue;\"><center><img src=emergency_service.png class=\"center\" width=\"250\" height=\"120\"></center>";
if(isset($_POST["s"]))
{
$id=$_SESSION['id'];
$cnum=$_SESSION['cnum'];
$st=$_POST["status"];
$time=$_POST["time"];
$date=$_POST["date"];
$conn = new mysqli("localhost", "root","", "emergency");
$sql="insert into incident values(inc_id,'$cnum','$id','$st','$date','$time',null,null,null,null)";
$r=mysqli_query($conn,$sql);
if($r)
{
  echo "<h1>STEP 3:<br></h1>";
  echo "SELECT MEDICAL ASSISTANCE REQUIRED <form action=conf_new3.php method=post> <select name=med_id><option value=null>none</option>";
  $conn = new mysqli("localhost", "root","", "emergency");
  $sql="SELECT med_id,h_loc,h_name FROM hospitals, medical_units where hospitals.h_id=medical_units.h_id";
  $r=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_assoc($r))
  {
    if(isset($_POST["med_id"]) && $_POST["med_id"]==$row["med_id"])
  		echo "<option selected value=".$row["med_id"].">#".$row["med_id"].", ".$row["h_name"];
  	else
  		echo "<option value=".$row["med_id"].">#".$row["med_id"].", ".$row["h_name"];
  }
  echo "</select><br>";
  echo "SELECT POLICE ASSISTANCE REQUIRED <select name=force_id><option value=null>none</option>";
  $sql="SELECT force_id,stn_loc FROM pol_stn,pol_units where pol_stn.stn_id=pol_units.stn_id";
  $r=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_assoc($r))
  {
    if(isset($_POST["force_id"]) && $_POST["force_id"]==$row["force_id"])
  		echo "<option selected value=".$row["force_id"].">#".$row["force_id"].", ".$row["stn_loc"]." Station";
  	else
  		echo "<option value=".$row["force_id"].">#".$row["force_id"].", ".$row["stn_loc"]." Station";
  }
  echo "</select><br>";
  echo "SELECT FIRE BRIGADE REQUIRED <select name=brigade_id><option value=null>none</option>";
  $sql="SELECT brigade_id,stn_loc FROM fire_units,fire_stn where fire_stn.stn_id=fire_units.stn_id";
  $r=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_assoc($r))
  {
    if(isset($_POST["brigade_id"]) && $_POST["brigade_id"]==$row["brigade_id"])
  		echo "<option selected value=".$row["brigade_id"].">#".$row["brigade_id"].", ".$row["stn_loc"]." Station";
  	else
  		echo "<option value=".$row["brigade_id"].">#".$row["brigade_id"].", ".$row["stn_loc"]." Station";
  }

  echo "</select><br>ESTIMATED RESPONSE TIME <input type=number name=resp id=resp><BR><BR><input type=submit value=confirm></form><br><hr>";

}
else echo "ksdfjksbdvkj SQL ERROR";

}
else
echo "ksdfjksbdvkj";

/*
echo "SELECT MEDICAL ASSISTANCE REQUIRED <form action=inc_new3.php method=post> <select name=med_id><option value=null>none</option>";
$conn = new mysqli("localhost", "root","", "emergency");
$sql="SELECT med_id,h_loc,h_name FROM hospitals, medical_units where hospitals.h_id=medical_units.h_id";
$r=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($r))
{
  if(isset($_POST["med_id"]) && $_POST["med_id"]==$row["med_id"])
		echo "<option selected value=".$row["med_id"].">#".$row["med_id"].", ".$row["h_name"];
	else
		echo "<option value=".$row["med_id"].">#".$row["med_id"].", ".$row["h_name"];
}
echo "</select><br>";
echo "SELECT POLICE ASSISTANCE REQUIRED <select name=force_id><option value=null>none</option>";
$sql="SELECT force_id,stn_loc FROM pol_stn,pol_units where pol_stn.stn_id=pol_units.stn_id";
$r=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($r))
{
  if(isset($_POST["force_id"]) && $_POST["force_id"]==$row["force_id"])
		echo "<option selected value=".$row["force_id"].">#".$row["force_id"].", ".$row["stn_loc"]." Station";
	else
		echo "<option value=".$row["force_id"].">#".$row["force_id"].", ".$row["stn_loc"]." Station";
}
echo "</select><br>";
echo "SELECT FIRE BRIGADE REQUIRED <select name=brigade_id><option value=null>none</option>";
$sql="SELECT brigade_id,stn_loc FROM fire_units,fire_stn where fire_stn.stn_id=fire_units.stn_id";
$r=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($r))
{
  if(isset($_POST["brigade_id"]) && $_POST["brigade_id"]==$row["brigade_id"])
		echo "<option selected value=".$row["brigade_id"].">#".$row["brigade_id"].", ".$row["stn_loc"]." Station";
	else
		echo "<option value=".$row["brigade_id"].">#".$row["brigade_id"].", ".$row["stn_loc"]." Station";
}

echo "</select><br>ESTIMATED RESPONSE TIME <input type=number name=resp id=resp><BR><BR><input type=submit value=confirm></form><br><hr>";
if(isset($_POST["med_id"]) && isset($_POST["force_id"]) && isset($_POST["brigade_id"]) )
{
  echo "iehafklahwl";
  $res=$_POST["resp"];
  $med=$_POST["med_id"];
  $pol=$_POST["force_id"];
  $fire=$_POST["brigade_id"];
  $sql="insert into incident values(inc_id,'$cnum','$id','$st','$date','$time','$res','$med','$pol','$fire')";
  $r=mysqli_query($conn,$sql);
  if($r)
  echo "Incident reported!";
  else
  echo "Fail!";

}*/
