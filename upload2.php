<?php
session_start();

echo "logged in User : ". $_SESSION['username'];
?>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kafala";

// Create connection with database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";


if(isset($_POST['up'])==true){
    $prod= $_POST['pid'];
 
    $check = $_FILES['pic']['name'];
   if(!empty($check)){
  
    $filename = $_FILES['pic']['name'];
    $tmp_loc = $_FILES['pic']['tmp_name'];
    $size = $_FILES['pic']['size'];
    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $filename);
    $imageExtension = strtolower(end($imageExtension));
    $photoid =$_POST['pid'];
    
    echo $size;

    $upload = 'products/';
    if(in_array($imageExtension, $validImageExtension)){
         if($size<3000000){ 
             
            
            $newImageName = $_POST['pid']."_1";
            $newImageName .= '.' . $imageExtension;
            $newLocation = 'products/'.$newImageName ;
      move_uploaded_file($tmp_loc, 'products/' . $newImageName);
      $sql = "insert into pictures values('$photoid','$newImageName','$newLocation');";
      $conn->query($sql);
            echo 'upload success';
            
        } else { 
            echo 'FILE SIZE TOO LARGE ' ;
        }
        
    }
    else { // file size block
        echo "EXTENTION NOT SUPPORTED !";
    }

   }
   else
   {
    echo "<br>PLEASE UPLOAD PHOTO 1 ! UPLOAD FIELD IS EMPTY";
   }
}


?>



<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kafala";

// Create connection with database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";


if(isset($_POST['up'])==true){
    $check = $_FILES['pic2']['name'];
   if(!empty($check)){
  
    $filename = $_FILES['pic2']['name'];
    $tmp_loc = $_FILES['pic2']['tmp_name'];
    $size = $_FILES['pic2']['size'];
    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $filename);
    $imageExtension = strtolower(end($imageExtension));
    $photoid =$_POST['pid'];
    
    echo $size;

    $upload = 'products/';
    if(in_array($imageExtension, $validImageExtension)){
         if($size<3000000){ 
             
            
            $newImageName = $_POST['pid']."_2";
            $newImageName .= '.' . $imageExtension;
            $newLocation = 'products/'.$newImageName ;
      move_uploaded_file($tmp_loc, 'products/' . $newImageName);
      $sql = "insert into pictures values('$photoid','$newImageName','$newLocation');";
      $conn->query($sql);
            echo 'upload success';
            
        } else { 
            echo 'FILE SIZE TOO LARGE ' ;
        }
        
    }
    else{ // file size block
        echo "EXTENTION NOT SUPPORTED !";
    }

   }
   else
   {
    echo "PLEASE UPLOAD PHOTO 2 ! UPLOAD FIELD IS EMPTY<br>";
   }
}


?>



<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kafala";

// Create connection with database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully <br>";


if(isset($_POST['up'])==true){
    $check = $_FILES['pic3']['name'];
   if(!empty($check)){
  
    $filename = $_FILES['pic3']['name'];
    $tmp_loc = $_FILES['pic3']['tmp_name'];
    $size = $_FILES['pic3']['size'];
    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $filename);
    $imageExtension = strtolower(end($imageExtension));
    $photoid =$_POST['pid'];
    
    echo $size;

    $upload = 'products/';
    if(in_array($imageExtension, $validImageExtension)){
         if($size<3000000){ 
             
            
            $newImageName = $_POST['pid']."_3";
            $newImageName .= '.' . $imageExtension;
            $newLocation = 'products/'.$newImageName ;
      move_uploaded_file($tmp_loc, 'products/' . $newImageName);
      $sql = "insert into pictures values('$photoid','$newImageName','$newLocation');";
      $conn->query($sql);
            echo 'upload success';
            
        } else { 
            echo 'FILE SIZE TOO LARGE ' ;
        }
        
    }
    else{ // file size block
        echo "EXTENTION NOT SUPPORTED !";
    }

   }
   else
   {
    echo "PLEASE UPLOAD PHOTO 3 ! UPLOAD FIELD IS EMPTY<br>";
   }
}


?>


<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kafala";

// Create connection with database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";


if(isset($_POST['up'])==true){
    $check = $_FILES['pic4']['name'];
   if(!empty($check)){
  
    $filename = $_FILES['pic4']['name'];
    $tmp_loc = $_FILES['pic4']['tmp_name'];
    $size = $_FILES['pic4']['size'];
    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $filename);
    $imageExtension = strtolower(end($imageExtension));
    $photoid =$_POST['pid'];
    
    echo $size;

    $upload = 'products/';
    if(in_array($imageExtension, $validImageExtension)){
         if($size<3000000){ 
             
            
            $newImageName = $_POST['pid']."_4";
            $newImageName .= '.' . $imageExtension;
            $newLocation = 'products/'.$newImageName ;
      move_uploaded_file($tmp_loc, 'products/' . $newImageName);
      $sql = "insert into pictures values('$photoid','$newImageName','$newLocation');";
      $conn->query($sql);
            echo 'upload success';
            
        } else { 
            echo 'FILE SIZE TOO LARGE ' ;
        }
        
    }
    else{ // file size block
        echo "EXTENTION NOT SUPPORTED !";
    }

   }
   else
   {
    echo "<br>PLEASE UPLOAD PHOTO 4 ! UPLOAD FIELD IS EMPTY";
   }
}


?>
<?php

$pid = $_POST['pid'];
$_SESSION['pid']= $pid; 

$phptime=time();
      $t=date('Y-m-d H:i:s', $phptime);
$sql4 = "INSERT INTO `notifications`(`not_id`, `notification_title`, `notification`,`time`) VALUES ('',' [$pid] Product REG','PRODUCT [$pid] : UPLOADED SUCCESSFULLY ','$t')";
      
if ($conn->query($sql4) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql4 . "<br>" . $conn->error;
}


header('Location: http://localhost/kafala/upload3.php',true,303);
?>

