<?php
session_start();
 

    $oid=  $_GET['oid'];
    
   ?>
   
   <form  action="" method="POST">
    <input type="text" name="a">
    <input type="submit" name="b" >
    <input type="text" name="c" value="<?php echo $oid;?>">
   </form>
   
   <?php
  if(isset($_POST['b'])){
    $hName='localhost'; // host name
    $uName='root';   // database user name
    $password='';   // database password
    $dbName = "kafala"; // database name
    $conn = mysqli_connect($hName,$uName,$password,"$dbName");
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
      }
    $a= $_POST["a"];
    $c= $_POST["c"];
  
    $sql = "UPDATE customer
    SET req='$a'
    WHERE order_id=$oid;";

    echo $c." x ",$a ;

    if ($conn->query($sql) === TRUE) {
      header('Location: http://localhost/kafala/order_management.php',true,303);
        
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

    }


?>
