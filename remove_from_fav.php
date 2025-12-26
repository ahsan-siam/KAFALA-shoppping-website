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
     $prod=$_GET['prod'] ;
     $sql = "DELETE FROM `favourites` WHERE favourite=$prod ;";
     
     if ($conn->query($sql) === TRUE) {
        header('Location: http://localhost/kafala/favourites.php',true,303);
         
     } else {
       echo "Error: " . $sql . "<br>" . $conn->error;
     }

    

?>