<?php

session_start();

echo "logged in User : ". $_SESSION['username']."<br>";
echo "PRODUCT : ". $_SESSION['pid'];
$pid=$_SESSION['pid'];

$hName='localhost'; // host name
$uName='root';   // database user name
$password='';   // database password
$dbName = "kafala"; // database name
$dbCon = mysqli_connect($hName,$uName,$password,"$dbName");
  if(!$dbCon){
      die('Could not Connect MySql Server:' .mysql_error());
  }
$query ="select *  from product where pid='$pid'";
$result =mysqli_query($dbCon,$query);

while($rows=mysqli_fetch_assoc($result)){
    echo "<br>price".$rows['price'] ;
    echo "<br>stock".$rows['stock'] ;
    echo "<br>rating".$rows['rating'] ;
    echo "<br>gender".$rows['gender'] ;
    echo "<br>type".$rows['type'] ;
    echo "<br>category".$rows['category'] ;
}
?>
<html>

<a href="admin_menu.php"> <button> GO Back</button></a>
</html>


   