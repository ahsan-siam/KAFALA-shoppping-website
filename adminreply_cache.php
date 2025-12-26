<?php 
 $hName='localhost'; // host name
 $uName='root';   // database user name
 $password='';   // database password
 $dbName = "kafala"; // database name
 $conn = mysqli_connect($hName,$uName,$password,"$dbName");
   if(!$conn){
       die('Could not Connect MySql Server:' .mysql_error());
   }
   
   $reciever= $_POST["conv_code"]; // W/O DialCode 9999
   $reply= $_POST["reply"]; 
   echo $reciever." : ".$reply." : " ;
   $code= $reciever+9999;
   echo $code;
   $phptime=time();
    $time=date('Y-m-d H:i:s', $phptime);

   $sql= "INSERT INTO `messenger`(`id`, `conv_code`, `text`, `time`) VALUES ('admin','$code','$reply','$time')";
   if ($conn->query($sql) === TRUE) {
  
      echo "sent";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }





   ?>