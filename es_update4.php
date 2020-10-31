<body style="background-color:powderblue;"><?php
session_start();
if(isset($_POST["status"]))
{
    $conn= new mysqli("localhost","root","","emergency");$sql="update incident set status = '".$_POST["status"]."' where inc_id=".$_SESSION['inc_id'];
    $r=mysqli_query($conn,$sql);
    if($r)
    echo "DONE!";
    else
    echo "error";
}

?>
<a href=es_op_portal.php >Click to go back to previous page!</a>
