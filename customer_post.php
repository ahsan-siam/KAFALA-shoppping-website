<?php
echo "good";

session_start();
$_SESSION["seemore"]=3;
$user= $_SESSION['username'] ;
$paragraph=$_POST["paragraph"];
echo $user;

$phptime=time();
$time=date('Y-m-d H:i:s', $phptime);




$hName='localhost'; // host name
$uName='root';   // database user name
$password='';   // database password
$dbName = "kafala"; // database name
$conn = mysqli_connect($hName,$uName,$password,"$dbName");
  if(!$conn){
      die('Could not Connect MySql Server:' .mysql_error());
  } 

  $sql1= "select post_id from posts order by post_id desc limit 1" ;

$result =mysqli_query($conn,$sql1) or die("query failed");
$row = mysqli_fetch_assoc($result);
$img_title= $row['post_id']+1;














  $check = $_FILES['pic']['name'];
   if(!empty($check)){
  
    $filename = $_FILES['pic']['name'];
    $tmp_loc = $_FILES['pic']['tmp_name'];
    $size = $_FILES['pic']['size'];
    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $filename);
    $imageExtension = strtolower(end($imageExtension));
    $photoid =$img_title;
    
    echo $size;

    $upload = 'post_approval/';
    if(in_array($imageExtension, $validImageExtension)){
         if($size<3000000){ 
             
            
            $newImageName = $img_title;
            $newImageName .= '.' . $imageExtension;
            $newLocation = 'post/'.$newImageName ;
      move_uploaded_file($tmp_loc, 'post/' . $newImageName);
         }
        }
    }

    $sql2= "INSERT INTO `posts`( `title`, `customer_id`, `time`, `photo_url`) VALUES ('title',$user,'$time','$newLocation')" ;

if ($conn->query($sql2) === TRUE) {
    echo "entry success";
    
  
  //header('Location: http://localhost/kafala/fashionfeed.php',true,303);
  } else {
    
    echo "Error: " . $sql2 . "<br>" . $conn->error;
  }

  $sql3="INSERT INTO `posts2`(`post_id`, `paragraph`) VALUES ('$img_title','$paragraph');";
  if ($conn->query($sql3) === TRUE) {
    echo "entry success";
    
  
  header('Location: http://localhost/kafala/fashionfeed.php',true,303);
  } else {
    
    echo "Error: " . $sql3 . "<br>" . $conn->error;
  }
?>