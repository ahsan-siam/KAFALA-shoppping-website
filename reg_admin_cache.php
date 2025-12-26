<?php

$hName='localhost'; // host name
$uName='root';   // database user name
$password='';   // database password
$dbName = "kafala"; // database name
$conn = mysqli_connect($hName,$uName,$password,"$dbName");
  if(!$conn){
      die('Could not Connect MySql Server:' .mysql_error());
  }
//done


if(isset($_POST["Submit"])==true){
    $name = $_POST['name'];           //product id 
    $phone = $_POST['phone'];
    $pos = $_POST['pos'];
    $pass = $_POST['pass'];
    $phptime=time();
    $time=date('Y-m-d H:i:s', $phptime);
    
    
  $hash= password_hash($pass,PASSWORD_DEFAULT);
  echo "your pass"."<br>";
  echo $pass;
  echo "THIS IS HASH" ;
  echo  $hash ;
    //DATABASE CONNECTION
    
  
    
    
    //done
   


    $sql3 = "SELECT id FROM employee ORDER BY id DESC LIMIT 1;";
    
    $id;


$result = $conn->query($sql3);

if ($result = $conn->query($sql3)) {
   
    while ($row = $result->fetch_assoc()) {
      
        $id = $row["id"];
        $id=$id+1;
        
    }
    echo "</tr>";
 echo "</tbody></table>";
    
}


    $sql = "INSERT INTO `employee`(`id`,`name`, `pos`,`phone`,`reg_time`) VALUES ('$id','$name','$pos','$phone','$time')";


    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
        echo $name;
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

       
$sql2 = "INSERT INTO login Values('$id','$pass','$hash')";
    echo $hash;
    if ($conn->query($sql2) === TRUE) {
        echo "New record created successfully";
          echo $name;
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
  

      
$sql4 = "INSERT INTO `notifications`(`not_id`, `notification_title`, `notification`,`time`) 
VALUES ('','$id JOINNED KAFALA','New Member $id successfully registered,change id and pass from portal ','$time');";
      
if ($conn->query($sql4) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql4 . "<br>" . $conn->error;
}



}




?>
