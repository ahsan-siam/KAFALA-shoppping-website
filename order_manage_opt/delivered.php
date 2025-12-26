<?php
session_start();
$hName='localhost'; // host name
$uName='root';   // database user name
$password='';   // database password
$dbName = "kafala"; // database name
$conn = mysqli_connect($hName,$uName,$password,"$dbName");
  if(!$conn){
      die('Could not Connect MySql Server:' .mysql_error());
  }
$oid=$_GET['varname'];
$logged_in_user=  $_SESSION['username'];


  $sql = "UPDATE Customer
  SET done='1'
  WHERE order_id=$oid;";
  $sql2 = "UPDATE Customer
  SET confirmed_by=$logged_in_user
  WHERE order_id=$oid;";

  
  if (mysqli_query($conn, $sql)) {
    if (mysqli_query($conn, $sql2)) {
        header('Location: http://localhost/kafala/order_management.php',true,303);
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
 
  
  mysqli_close($conn);
 
?>