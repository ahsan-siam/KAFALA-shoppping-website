


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
	 
	 
$user = $_POST["id"];
$pass = $_POST["pass"];
$sql= "select hash from cus_login where id='$user' " ;

$result =mysqli_query($conn,$sql) or die("query failed");
$row = mysqli_fetch_assoc($result); 
print_r($row);
$prev_hash= $row['hash'];
if(password_verify($pass,$prev_hash)){
  $new_hash= password_hash($pass,PASSWORD_DEFAULT);
  echo $new_hash;

  $sql5= "UPDATE `cus_login` SET `hash`='$new_hash' WHERE id= $user " ;
  if ($conn->query($sql5) === TRUE) {
    echo "Hash entry success";
    
  $_SESSION['username']= $user ;
  $_SESSION['login']= true ;
  
  header('Location: http://localhost/kafala/fashionfeed.php',true,303);
  } else {
    echo "Error: " . $sql5 . "<br>" . $conn->error;
  }


exit;
}
else
echo "incorrect password";


?>