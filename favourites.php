<?php
session_start();

$user=$_SESSION["username"];
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
?>
<html>
    <head><title>Favourites</title>

    <link rel="stylesheet" href="feed_nav.css">
    </head>

    <body style=" background-image: url('Update_version/n2.jpg');
    background-repeat: no-repeat;
    background-size: cover;background-attachment: fixed;">

<a href="signout.php"><button style="border-radius:15px;
    background-image: url('Update_version/logout.jpg');background-size:cover;height:63;width:57;float:right;margin: 10px;"></button></a>
    <nav>
  <a href="logged_in_shop.php" >   Home </a>
  <a href="fashionfeed.php"> Fashion Feed </a>
  <a href="history.php"> History </a>
  <a href="cart.php"> MyCart </a>
  <a href="Favourites.php"> Favourites</a>
</nav>

<?php

$fav_prods;
$sql1 = " SELECT favourite FROM favourites  where customer_id=$user;";
$result = $conn->query($sql1);

if ($result->num_rows > 0) {
// output data of each row
$i=0;
while($row = $result->fetch_assoc()){
   $fav_prods[$i] = $row["favourite"];
   
  // echo $pid1[$i];
  $i=$i+1;
}
} else {
echo "0 results";
}

?>



<?php
for($j=0;$j<$i;$j++){


   
$sql1 = " SELECT pid,price,rating,type,category,prod_name FROM product  where pid=$fav_prods[$j];";
$result = $conn->query($sql1);

if ($result->num_rows > 0) {
// output data of each row

while($row = $result->fetch_assoc()){
   $name[$j] = $row["prod_name"];
   $price[$j] = $row["price"];
   $rating[$j] = $row["rating"];
   $category[$j] = $row["category"];
   $pid[$j] = $row["pid"];
   $type[$j] = $row["type"];
  // echo $pid1[$i];
  
}
} else {
echo "0 results";
}

$sql2 = " SELECT photo_url FROM pictures  where pid=$fav_prods[$j];";
$result = $conn->query($sql2);

if ($result->num_rows > 0) {
// output data of each row

while($row = $result->fetch_assoc()){
   $photo[$j] = $row["photo_url"];
   
  // echo $pid1[$i];
 
}
} else {
echo "0 results";
}
    
}

?>







        <?php
        $shift=250;
        for($t=0;$t<$i;$t++){ ?>

        <div style="line-height:70%;position: absolute;top:<?php 

              
              echo "+".$shift;
              $shift=$shift+270;?>px
              
              ;left:180px;height:250px;width:1100px;border: 1px solid cyan;border-radius:5px;">
            <img src="<?php echo $photo[$t];  ?>" style="position:absolute;top:10px;left:10px;height:200px;width:200px;">
          
            <div style="position:absolute;top:10px; left:225px; height:200px; width:750px;">
            <h1> <?php echo $name[$t]; ?></h1> <h1 style="float:right;"> <?php echo $price[$t]." BDT"; ?>  </h1>
            <h2 style="line-height:30%;color:grey;"> <?php echo $type[$t]; ?></h2>
            <h3 style="line-height:55%;color:grey;"> <?php echo $category[$t]; ?></h3>
            
            <a href="remove_from_fav.php?prod=<?php echo $pid[$t]; ?>"><button style="cursor:pointer">REMOVE</button></a>
          </div>
         
        </div>
        <?php     } ?>

        

    </body>
</html>