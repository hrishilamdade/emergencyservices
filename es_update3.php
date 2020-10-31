<body style="background-color:powderblue;"><?php
if(isset($_POST["inc_id"]))
{
  session_start();
  $conn = new mysqli("localhost", "root","", "emergency");
  $_SESSION['inc_id']=$_POST["inc_id"];
  $sql="Select inc_date,inc_id,status from incident where incident.inc_id = ".$_SESSION['inc_id'];
  $r=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($r);
  $date=$row["inc_date"];
  $status=$row["status"];
  echo " <p style=color:brown;font-size:150%>Date : ".$date."<br>ID : ".$_SESSION['inc_id']."<br>Status : <form action=es_update4.php method=post><input type=text name=status id=status value=".$status."><br></input><input type=submit value=Save></form><br>";
}
echo "<a href=es_op_portal.php style=color:orange;font-size:130%><b><hr>GO BACK TO OPERATOR PORTAL<br><br>";
