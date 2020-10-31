<body style="background-color:powderblue;"><?php
session_start();
echo "<center><img src=emergency_service.png class=\"center\" width=\"250\" height=\"120\"></center>";
$id=0;
if($_SERVER['REQUEST_METHOD']=="POST" && ($_POST["id"]!=NULL) && $_POST["id"]<11)
{
     if((isset($_POST["id"])))
  		$_SESSION['id']=$_POST["id"];
  echo"<p style=color:brown;font-size:150%>Welcome, ";
   $conn = new mysqli("localhost", "root","", "emergency");
   $sql="select cent_loc,mgr_name from centre where cent_id= ".$_SESSION['id'];
   if ($conn->connect_error)
 die("False connection " . $conn->connect_error);
   $r=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($r);
    $mgrname=$row["mgr_name"];
    $location=$row["cent_loc"];
    echo $mgrname."                <p style=color:grey;font-size:160%> ".$location." Call Centre";
    echo "</p><hr><br><b><p style=color:black;font-size:150%>MANAGER FUNCTIONS</p></b>";
    echo"<br><a href=es_view_operator_inc.php style=color:green;font-size:130%><b>1)VIEW OPERATOR INCIDENTS <br><br>";
    echo"<a href=es_edit_operator_rating.php style=color:green;font-size:130%><b>2)VIEW AND UPDATE OPERATOR RATINGS <br><br>";
    echo"<a href=es_hire_op.php style=color:green;font-size:130%><b>3)HIRE OPERATOR <br><br>";
    //echo"<a href=es_fire_op.php style=color:green;font-size:130%><b>4)FIRE OPERATOR <br><br>";
    echo "<a href=es_centre_directory.php style=color:green;font-size:130%><b>4)CALL CENTRE DIRECTORY <br><br>";
    echo "<a href=es_man_portal.php style=color:orange;font-size:130%><b><hr>GO BACK TO MANAGER PORTAL<br><br>";
}
else {
  echo "<p style=color:brown;font-size:200%>Error ID entered.<br>";
  echo "<a href=es_man_portal.php >Click to go back to previous page!</a></p>";
}
?>
<body style="background-color:powderblue;">
