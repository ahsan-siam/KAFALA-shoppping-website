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

      
      $id=  $_POST['id'];
      $pass=$_POST['pass'];
      echo $id ;
      echo $pass;



      


    $name=  $_POST['name'];
    $num=$_POST['phone'];
    $add=$_POST['address'];
    $gross=$_POST['gross'];
    $phptime=time();
    $time=date('Y-m-d H:i:s', $phptime);
    $sql = "INSERT INTO `customer`(`customer_id`,`order_id`, `customer_name`, `number`, `location`, `gross_amount`, `confirm`, `confirmed_by`, `order_date`, `order_status`, `Payment`) 
VALUES ('$id','','$name','$num','$add','$gross','','','$time','','COD');";
    
      $sql1= "select pass from cus_login where id='$id' ;" ;

$result =mysqli_query($conn,$sql1) or die("query failed");
$row = mysqli_fetch_assoc($result);
//print_r($row);
//echo $row['pass']."";
if($pass== $row['pass'].""){

  if ($conn->query($sql) === TRUE) {

    

$sql4 = "INSERT INTO `notifications`(`not_id`, `notification_title`, `notification`,`time`) VALUES ('','NEW ORDER[Update]','TAKE ACTIONS','$time')";
      
if ($conn->query($sql4) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql4 . "<br>" . $conn->error;
}










    
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
   foreach ($_SESSION['cart'] as $key =>$value) {
      
      echo"
          <center>Product:$value[Item]    Price: $value[price]</center><br>
      ";
  }

  $sql2= "select order_id from customer where customer_name='$name' ;" ;

$result =mysqli_query($conn,$sql2) or die("query failed");
$customer_order_id = mysqli_fetch_assoc($result);
$oid=$customer_order_id['order_id']."";
//echo $customer_order_id['order_id']."";

foreach ($_SESSION['cart'] as $key =>$value) {
  $x=$value['Item'];
  $y=$value['price'];
      if ($conn->query("INSERT INTO `orders`(`order_id`, `pid`, `price`) VALUES ('$oid','$x','$y');") === TRUE) {
        $conn->query("UPDATE `product` SET `sale`=sale+1 WHERE pid ='$x' ");
        
    
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  }
  echo "<center> GROSS AMOUNt:".$gross;
  echo "</center>";

  $sqlc= "select inc from analytics;";
  $resultc =mysqli_query($conn,$sqlc) or die("query failed");
$rowc = mysqli_fetch_assoc($resultc);
$visit_count = $rowc['inc']."";
$visit_count=$visit_count+1;

//......Update sale++
 



  
}
else
echo "incorrect password";




?>
