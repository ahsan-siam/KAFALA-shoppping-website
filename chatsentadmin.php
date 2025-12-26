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
 

   



$chat=$_POST["chat"];
$code=$_POST["code"];
$id=$_SESSION["username"];
$sql = "select name from cus_login where id= $id";

if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
      
        $sender = $row["name"];
    }
}
else {

}
$phptime=time();
$t=date('Y-m-d H:i:s', $phptime);
  $query = "INSERT INTO `messenger`(`id`, `conv_code`, `text`,`time`) VALUES ('Admin',$code,'$chat','$t');";

  if ($conn->query($query) === TRUE) {
    echo "SENT";
header('Location: http://localhost/kafala/chatboxadmin.php',true,303);
}

else{
    echo "Error: " . $query . "<br>" . $conn->error;
}
?>