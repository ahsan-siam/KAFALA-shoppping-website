<?php

session_start();
if($_SESSION['login']==true){
    ?>
    <?php

 

//DATABASE CONNECTION
  
$hName='localhost'; // host name
$uName='root';   // database user name
$password='';   // database password
$dbName = "kafala"; // database name
$conn = mysqli_connect($hName,$uName,$password,"$dbName");
  if(!$conn){
      die('Could not Connect MySql Server:' .mysql_error());
  }

 echo " Success !" ;
  $x= $_SESSION['username'];
  $y= $_GET['pid'];
  $time=date('Y-m-d H:i:s', $phptime);
  echo $time;
  $sql = "INSERT INTO `favourites`(`customer_id`, `favourite`,`added`) VALUES ($x,$y,'$time')";

  if ($conn->query($sql) === TRUE) {
    header('Location: http://localhost/kafala/favourites.php',true,303);
   
      
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }




//done
?>
<?php
}
?>