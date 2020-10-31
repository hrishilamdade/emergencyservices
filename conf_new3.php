<body style="background-color:powderblue;">
  <?php
session_start();
echo "<center><img src=emergency_service.png class=\"center\" width=\"250\" height=\"120\"></center>";
if($_SERVER['REQUEST_METHOD']=="POST")
{
  $med=$_POST["med_id"];
  $pol=$_POST["force_id"];
  $fire=$_POST["brigade_id"];
  $resp=$_POST["resp"];
  $id=$_SESSION['id'];
  $cnum=$_SESSION['cnum'];
  $conn = new mysqli("localhost", "root","", "emergency");
  echo "<h2><b>Medical Unit ID : ".$med."<br>Task Force Id : ".$pol."<br>Fire Brigade Id: ".$fire." <br><hr>";
  $sql="update incident set med_id=$med,force_id=$pol,brigade_id=$fire,response_min=$resp where caller_num=$cnum and op_id=$id";
  $r=mysqli_query($conn,$sql);
  if($r)
  {
    echo "Assistance deployed as directed!";

  }
  else {
    echo "FAIL!!";
  }
}
?>
<br><hr><a href=es_man_portal.php >Click to go back to portal!</a>
