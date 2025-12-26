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
	 
	 
$user = $_POST["user"];
$pass = $_POST["pass"];
$hash = password_hash($pass,PASSWORD_DEFAULT);
$role;
$sql= "select pass from login where id='$user';" ;
$sql2= "select pos from employee where id='$user' ;" ;
$sql3= "select hash from login where id='$user' ;" ;

$result =mysqli_query($conn,$sql) or die("query failed");
$row = mysqli_fetch_assoc($result);

$result2 =mysqli_query($conn,$sql2) or die("query failed");
$row2 = mysqli_fetch_assoc($result2);

$result3 =mysqli_query($conn,$sql3) or die("query failed");
$row3 = mysqli_fetch_assoc($result3);
$previous_hash = $row3['hash'];
print_r($row3['hash']);
//echo $row['pass']."";
if(password_verify($pass,$previous_hash)){
  echo "new hash : ";
  echo $hash;
  $sql4= "UPDATE `login` SET `hash`='$hash' WHERE id= $user " ;
  if ($conn->query($sql4) === TRUE) {
    echo "Hash entry success";
  } else {
    echo "Error: " . $sql4 . "<br>" . $conn->error;
  }

  if($row2['pos']=="admin" || $row2['pos']=="Admin"){
    $_SESSION['username']= $user ;
header('Location: http://localhost/kafala/admin_menu.php',true,303);

  }
  if($row2['pos']=="Moderator" || $row2['pos']=="moderator"){
    $_SESSION['username']= $user ;
header('Location: http://localhost/kafala/moderator_menu.php',true,303);

  }
  if($row2['pos']=="Content Creator" || $row2['pos']=="Content creator" ||$row2['pos']=="content creator"){
    $_SESSION['username']= $user ;
header('Location: http://localhost/kafala/content_creator.php',true,303);

  }


}
else
echo "incorrect password";

?>