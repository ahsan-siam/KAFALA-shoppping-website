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
      
      $serial=$_GET["id"];
      echo $serial;
?>
<html>
<head>
    <link rel="stylesheet" href="feed_nav.css">
  </head>
  <body style="  background-image: url('Update_version/n1.jpg');
    background-repeat: no-repeat;
    background-size: cover;">

<nav>
  <a href="#" >   Home </a>
  <a href="fashionfeed.php"> Fashion Feed </a>
  <a href="history.php"> History </a>
  <a href="#"> MyCart </a>
  <a href="#"> Favourites</a>
</nav>
        <a href="signout.php"><button style="position:absolute;top:30px;left:860;border-radius:15px;
    background-image: url('util/signout.png');height:63;width:57;"></button></a>
        <a href="shop.php"><button style="background-image: url(util/cart.jpg);position:absolute; top:20px;left:1100px;height: 50px;width: 50px;border:1px solid black;"> SIGNOUT </button></a>


     <?php
     $id= $_SESSION['username'];
 $query = "SELECT title,customer_id,time,photo_url FROM posts Where post_id=$serial";
 $query2 = "SELECT paragraph FROM posts2 Where post_id=$serial";

if ($result = $conn->query($query)) {
  
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
      
        $title = $row["title"];
        $user_id = $row["customer_id"];
        $time= $row["time"];
        $url = $row["photo_url"];
        echo $url;
    }
    
}

if ($result2 = $conn->query($query2)) {
  
    /* fetch associative array */
    while ($row2 = $result2->fetch_assoc()) {
      
        $paragraph = $row2["paragraph"];
     
    }
    
}

$query3 = "SELECT name FROM cus_login Where id=$user_id";
if ($result3 = $conn->query($query3)) {
    /* fetch associative array */
    while ($row3 = $result3->fetch_assoc()) {
        $name = $row3["name"];
       
    }
}     
   ?>



<div style="overflow-x: scroll;padding:8px;position:absolute;left:100px;top:200px;height:100%;width:1000px;border: 1px solid grey;">
    <div style="padding:8px;position:absolute;left:10px;top:20px;">
    <style type="text/css">
        p{
            text-allign:justify;
            
        }
        p::first-letter{
            font-size:200%;
            font-family: times new roman;
        }
        img{
            margin:10px;
        }
    </style>

            <h1><?php echo $title; ?></h1>
            <p1 style="text-align:justify;">Posted By <b><?php echo $name."</b>, Posted on : <b>".$time ?></b></p1> 
        <p style="text-align:justify;padding:5px;"><img style="float:left;height: 400px;width:400px;allign:left" 
        src="<?php echo $url;?>" > <?php echo $paragraph;?></p>
    </div>
   
</div>


    </body>

    </html>
