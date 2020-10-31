<body style="background-color:powderblue;"><?php
session_start();
echo "<center><img src=emergency_service.png class=\"center\" width=\"250\" height=\"120\"></center>";
if($_SERVER['REQUEST_METHOD']=="POST" && ($_POST["id"]!=NULL))
{
     if((isset($_POST["id"])))
  		$_SESSION['id']=$_POST["id"];
  echo"<p style=color:brown;font-size:150%>Welcome, ";
   $conn = new mysqli("localhost", "root","", "emergency");
   if ($conn->connect_error)
 die("False connection " . $conn->connect_error);
   $sql="select fname,lname,rating from operator where op_id= ".$_SESSION['id'];
   $r=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($r);
    $fname=$row["fname"];
    $lname=$row["lname"];
    $rating=$row["rating"];
    echo $fname." ".$lname."                <p style=color:grey;font-size:120%> RATING : ".$rating;
    echo "</p><hr><br><b><p style=color:black;font-size:150%>OPERATOR FUNCTIONS</p></b>";
    echo"<br><a href=es_view_incident.php style=color:green;font-size:130%><b>1)VIEW INCIDENTS <br><br>";
    echo"<a href=es_update_incident.php style=color:green;font-size:130%><b>2)UPDATE INCIDENT (STATUS) <br><br>";
    echo"<a href=es_new_incident.php style=color:green;font-size:130%><b>3)REPORT NEW INCIDENT <br><br>";
    echo "<a href=es_centre_directory.php style=color:green;font-size:130%><b>4)CALL CENTRE DIRECTORY <br><br>";
    echo "<a href=es_op_portal.php style=color:orange;font-size:130%><b><hr>GO BACK TO OPERATOR PORTAL<br><br>";
}
else {
  echo "<p style=color:brown;font-size:200%>No ID entered.<br>";
  echo "<a href=es_op_portal.php >Click to go back to previous page!</a></p>";
}
?>
