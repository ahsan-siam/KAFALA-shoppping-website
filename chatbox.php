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
      
?>
<html>
<head>
    <link rel="stylesheet" href="feed_nav.css">
  </head>
  <body style="  background-image: url('Update_version/n1.jpg');
    background-repeat: no-repeat;
    background-size: cover;">

<nav>
  <a href="#" >   Home </a>
  <a href="fashionfeed.php"> Fashion Feed </a>
  <a href="history.php"> History </a>
  <a href="#"> MyCart </a>
  <a href="#"> Favourites</a>
</nav>
<div style="position:absolute;left:130;top:200px;height:100%;width:600px;border:1px solid">
<?php 
$dial=9999+$_SESSION["username"];
$query = "SELECT * FROM `messenger` where conv_code=$dial order by time asc";
$k=0;
if ($result = $conn->query($query)) {
   ;
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
      
        $field0name[$k] = $row["id"];
        $field1name[$k] = $row["text"];
        $field2name[$k] = $row["time"];
        
        $k++;


    }
    
}

for($j=0;$j<$k;$j++){
  echo $field0name[$j]." :  ".$field1name [$j]." ,  ".$field2name[$j]."<br>"  ;
  echo "---------------------------------------------------------------";
        echo "<br>";
}

?>

<form action="chatsent.php" method="post">

<input type="text" name="chat">
<input type="submit" value="SEND" name="sent">
<input type="hidden" value="<?php echo $dial; ?>" name="code">

</form>

</div>

    </body>
    </html>