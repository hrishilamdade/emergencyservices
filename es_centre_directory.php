<body style="background-color:powderblue;"><?php
session_start();
echo "<center><img src=emergency_service.png class=\"center\" width=\"250\" height=\"120\"></center>";
echo "<p style=color:red;font-size:170%><b><b>CALL CENTRE DIRECTORY</p>";
$conn = new mysqli("localhost", "root","", "emergency");
$sql="select * from centre";
$r=mysqli_query($conn,$sql);
?>
  <style>
  table, th, td {
    border: 1px solid black;
  }
  </style>
  <table style=width:60%>
      <tr>
        <th>CENTRE ID
        <th>LOCATION
        <th>MANAGER NAME
        <th>NUMBER OF OPERATORS
        <th>ESTABLISHED
      </tr>
        <?php
        while($row=mysqli_fetch_assoc($r))
          {
            echo "<tr><th>".$row["cent_id"]."<th>".$row["cent_loc"]."<th>".$row["mgr_name"]."<th>".$row["number_of_operators"]."<th>".$row["year_est"];
            echo "</tr>";
          }

?>
<a href=es_man_portal.php >Click to go back to portal page!</a>
