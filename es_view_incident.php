<body style="background-color:powderblue;"><?php
session_start();
echo "<p style=color:red;font-size:170%><b>INCIDENTS REPORTED BY YOU<br><b></p>";
$conn = new mysqli("localhost", "root","", "emergency");
$sql="select loc,des,inc_id,inc_date,inc_time,status,med_id,force_id,brigade_id from caller,incident where caller.caller_num=incident.caller_num and op_id=".$_SESSION['id']." order by inc_date";
$r=mysqli_query($conn,$sql);
?>
  <style>
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
        <?php
        while($row=mysqli_fetch_assoc($r))
          {
            echo "<tr><th>".$row["loc"]."<th>".$row["des"]."<th>".$row["inc_date"]."-".$row["inc_time"]."<th>".$row["status"]."<th>".$row["med_id"]."<th>".$row["force_id"]."<th>".$row["brigade_id"];
            echo "</tr>";
          }
          echo"</table><h3>blank attribute means null";
?>
<body style="background-color:powderblue;">
  <br><a href=es_op_portal.php>Click to go back to portal</a>
