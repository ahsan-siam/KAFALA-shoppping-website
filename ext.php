<?php
session_start();

echo "logged in User : ". $_SESSION['username'];



//done



?>

<html>
    <body>
        <title>upload</title>
        <form action="upload.php" method="post" enctype="multipart/form-data">
        

        <label for="text">enter product id</label><br>
        <input type="number" name ="pid"><br><br>
        <input type="file" name ="pic"><br>
        <input type="file" name ="pic2"><br>
        <input type="file" name ="pic3"><br>
        <input type="file" name ="pic4"><br><br>
        <input type="submit" name ="up" value="upload photos"><br><br>
        
        </form>

        
    </body>
</html>
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
         if($size<300000){ 
             
            
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
         if($size<300000){ 
             
            
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
         if($size<300000){ 
             
            
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
         if($size<300000){ 
             
            
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