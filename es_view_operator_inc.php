<body style="background-color:powderblue;"><center><img src=emergency_service.png class="center" width="250" height="120"></center>
<form action=es_view_operator_inc.php method=POST>
<h1>Choose
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
  $_SESSION['op_id']=$_POST["op_id"];
  $conn = new mysqli("localhost", "root","", "emergency");
  $sql="select loc,des,inc_id,inc_date,inc_time,status,med_id,force_id,brigade_id from caller,incident where caller.caller_num=incident.caller_num and op_id=".$_SESSION['op_id']." order by inc_date";
  $r=mysqli_query($conn,$sql);

    echo "<style>
    table, th, td {
      border: 1px solid black;
    }
    </style>
    <table style=width:60%>
        <tr>
          <th>LOCATION
          <th>DESCRIPTION
          <th>DATE - TIME
          <th>STATUS
          <th>MEDICAL UNIT
          <th>POLICE UNIT
          <th>FIRE UNIT
        </tr>
          ";
          while($row=mysqli_fetch_assoc($r))
            {
              echo "<tr><th>".$row["loc"]."<th>".$row["des"]."<th>".$row["inc_date"]."-".$row["inc_time"]."<th>".$row["status"]."<th>".$row["med_id"]."<th>".$row["force_id"]."<th>".$row["brigade_id"];
              echo "</tr>";
            }
            echo"</table><h3>blank attribute means no entry is made</h3>";
          }
  ?>
