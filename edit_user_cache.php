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
	 
$logged_in_user=  $_SESSION['username'];
$phone = $_POST["phone"];
$nam = $_POST["name"];
$new_password = $_POST["n_pass"];
$current_password = $_POST["c_pass"];
$sql= "select hash from login where id='$logged_in_user' ;" ;


$new_hash= password_hash($new_password,PASSWORD_DEFAULT);
$result =mysqli_query($conn,$sql) or die("query failed");
$row = mysqli_fetch_assoc($result);
//print_r($row);
//echo $row['pass']."";


if(password_verify($current_password,$row['hash']."")){

 $sql2= "UPDATE employee
 SET name='$nam' 
 WHERE id=$logged_in_user;";

if ($conn->query($sql2) === TRUE) {
    echo "successfuly changed";
  } else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
  }

  $sql3= "UPDATE `login`
 SET pass='$new_password'
 WHERE id=$logged_in_user;";

if ($conn->query($sql3) === TRUE) {
    echo "successfuly changed";
  } else {
    echo "Error: " . $sql3 . "<br>" . $conn->error;
  }

  $sql5= "UPDATE login
 SET hash='$new_hash'
 WHERE id=$logged_in_user;";

if ($conn->query($sql5) === TRUE) {
    echo "successfuly changed";
  } else {
    echo "Error: " . $sql5 . "<br>" . $conn->error;
  }


  $sql4= "UPDATE employee
  SET  phone=$phone 
  WHERE id=$logged_in_user;";
 
 if ($conn->query($sql4) === TRUE) {
     echo "successfuly changed";
   } else {
     echo "Error: " . $sql4 . "<br>" . $conn->error;
   }
   $sql3= "UPDATE login
 SET pass=$new_password
 WHERE id=$logged_in_user;";



exit;
}
else
echo "incorrect password";


?>