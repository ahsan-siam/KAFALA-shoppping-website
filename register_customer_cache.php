<?php


//done


if(isset($_POST["Submit"])==true){
    $name = $_POST['name'];           //product id 
    $pass = $_POST['pass'];
    $phone = $_POST['phone'];
    
    
    //DATABASE CONNECTION
    
    $hName='localhost'; // host name
    $uName='root';   // database user name
    $password='';   // database password
    $dbName = "kafala"; // database name
    $conn = mysqli_connect($hName,$uName,$password,"$dbName");
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
      }
    
    
    //done
    
    $hash= password_hash($pass,PASSWORD_DEFAULT);
    $t=date('Y-m-d H:i:s', $phptime);
    $sql = "INSERT INTO `cus_login`(`id`,`name`, `pass`, `phone`,`reg_time`,`hash`) 
    VALUES ('','$name','$pass','$phone','$t','$hash')";
    
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
        echo $name;
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

}



?>
