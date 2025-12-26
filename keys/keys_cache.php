<?php
$hName='localhost'; // host name
$uName='root';   // database user name
$password='';   // database password
$dbName = "kafala"; // database name
$conn = mysqli_connect($hName,$uName,$password,"$dbName");
  if(!$conn){
      die('Could not Connect MySql Server:' .mysql_error());
  }

  $keys=$_POST["keys"];
  $pid=$_POST["id"];
  echo $pid;
  $sql = "UPDATE keywords SET words = '$keys' WHERE id='$pid'; ";
  
  if ($conn->query($sql) === TRUE) {
    header('Location: http://localhost/kafala/keys.php',true,303);;
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
?>
