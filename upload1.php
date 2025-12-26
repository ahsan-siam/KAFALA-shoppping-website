<?php
session_start();

echo "logged in User : ". $_SESSION['username'];

//done


if(isset($_POST["next"])==true){
    $pid = $_POST['pid'];           //product id 
    $price = $_POST['price'];
    $desc = $_POST['desc'];
    $gender = $_POST['gender'];
    $type = $_POST['type'];
    $cat = $_POST['category'];
    $name = $_POST['name'];
    
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
    
    echo '<br>PRODUCT ID: '.$pid ;
    $t=date('Y-m-d H:i:s', $phptime);
    $sql = "INSERT INTO `product`(`pid`, `price`, `stock`, `rating`,  `gender`, `type`, `category`,`up_time`,`prod_name`,`sale`) 
    VALUES ('$pid','$price','','','$gender','$type','$cat','$t','$name','0')";
    
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }




    $sql2 = "SELECT pid FROM product ORDER BY pid DESC LIMIT 1;";
    
    


$result = $conn->query($sql2);

if ($result = $conn->query($sql2)) {
   
    while ($row = $result->fetch_assoc()) {
      
        $pid1 = $row["pid"];
        
    }
    
}

$sql3 = "INSERT INTO `description`(`pid`, `passage`) VALUES ('$pid1','$desc') ;" ;
    
    if ($conn->query($sql3) === TRUE) {
      


      $phptime=time();
      $t=date('Y-m-d H:i:s', $phptime);
      $sql4 = "INSERT INTO `notifications`(`not_id`, `notification_title`, `notification`,`time`) VALUES ('',' [$pid1] Product REG','PRODUCT [$pid1] : REGISTRATION SUCCESSFULL , Upload Photos','$t')";
      
      if ($conn->query($sql4) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql4 . "<br>" . $conn->error;
      }
  










      header('Location: http://localhost/kafala/upload_2.php',true,303);
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }



}




?>

