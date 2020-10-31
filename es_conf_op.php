<?php
session_start();

if($_SERVER['REQUEST_METHOD']=="POST")
{
  $fn=$_POST["fname"];
  $ln=$_POST["lname"];
  $contact=$_POST["contact"];
  $email=$_POST["email"];
  $id=$_SESSION['id'];
  $year=date("Y");
  $conn = new mysqli("localhost", "root","", "emergency");
  $sql="insert into operator values(op_id,'$id','$fn','$ln','$contact','$email',70,'$year')";
  $r=mysqli_query($conn,$sql);
  if($r)
  echo "NEW OPERTAOR HIRED!";
  else {
      echo "FAILED!";// code...
  }

}

 ?>
