<?php

session_start();


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
  $search =$_GET["search"];
  
  $sql3 = "SELECT id
FROM keywords
WHERE words LIKE '%$search%' ; ";
  $result3 = $conn->query($sql3);
  $inc=0; // count of total number of items
echo  $_POST["search"] ;
if ($result3->num_rows > 0) {
  // output data of each row
  while($row3 = $result3->fetch_assoc()){
    $ids[$inc]= $row3['id'];
    $inc =$inc+1;
  }
} else {
    echo "else [lbock]";
}

print_r($ids);
$i=0;
$pid1_price;
for($j=0;$j<$inc;$j++){
    $sql = " SELECT pid,price FROM product   WHERE pid=$ids[$j];";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row

while($row = $result->fetch_assoc()){
   $pid1[$i] = $row["pid"];
   $pid1_price[$i] = $row["price"];
  // echo $pid1[$i];
  $i=$i+1;
}
} else {
echo "0 results";
}
print_r($pid1_price);
}

for($i=0;$i<$inc;$i=$i+1){

    $sql2 = "SELECT photo_id FROM pictures WHERE pid='$pid1[$i]'"; // img location
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
  // output data of each row
 
  while($row2 = $result2->fetch_assoc()){
     $img_id[$i]=$row2["photo_id"];
    // echo $img_id[$i];
    
    
  }
}
print_r($img_id);
}

 


  
  
  

?>

<html>
    <head>
        <link rel="stylesheet" href="style.css" />    
    </head>
    <body style="background-color:#c6c6c6">
  
    <div>
        <div class="container">
        
        <form action="search_result.php" method="post">
                <input type="text" value=" Search..." name="search">
                <input type="submit" >
            </form>
            <style>
                    *{

                        margin:0;
                        padding: 0;
                        font-family: 'Popins',sans-serif;
                        box-sizing: border-box;

                        }

                        .container{
                        width: 100%;
                        height: 100vh;
                        display: flex;
                        position: absolute;
                        top: 30px;
                        left: 600px;
                        }
                        form{
                        width: 600px;
                        height: 50px;
                        display: flex;
                         }
                        form input{
                            flex:1 ;
                            border: 1px;
                            outline: 10px;
                        }
                        form button{
                        background-color: red;
                        padding: 10px 50px;
                        border:10px;
                        outline: 10px;
                        }
            </style>

        </div>
        <a href="cart.php"><button style="color: green"> CART</button></a>

       
        <?php //.................2nd row --->> //
        ?>

        




    <div class="sidebar" >
    <a href="http://localhost/kafala/"><img src="util/kafala_logo.jpg" style="width:200px ; height:80px"  ></a>
        <ul class="nav">
            <li>
                <a href="#">
                    <i class="fas fa-server">
                        <span>MEN's WEAR</span>
                    </i>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-server">
                        <span>WOMEN's </span>
                    </i>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-server">
                        <span>WINTER </span>
                    </i>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-server">
                        <span>BENCHMARK</span>
                    </i>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-server">
                        <span>T-Shirts</span>
                    </i>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fas fa-server">
                        <span>Half Sleeve</span>
                    </i>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-server">
                        <span>Full Sleeve</span>
                    </i>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-server">
                        <span>Custom Search</span>
                    </i>
                </a>
            </li>

        </ul>
    </div>
    
    </div>
   
    
    <?php 
    $height_increment=0;
    for($k=0;$k<$inc;$k++){
    ?>
   
     <a href="product_onclick.php?varname=<?php echo $pid1[$k]; ?>">
    <div style="height:180px;width:1100px;position:absolute;top:<?php $height_increment=$height_increment+200; 
                                                                    echo $height_increment;?>px;left:300px; border:1px solid ">
    <img src="<?php echo "products/".$img_id[$k]; ?>" style="position:absolute;top:4px;left:4px;height:170px;width:150" >
    <div style="position:absolute; left:200px">
    <h2>PRORUCT <?php echo $pid1[$k]; ?></h2>
    <h3>PRICE : <?php echo $pid1_price[$k]; ?></h3></div>

    </div>
    </a>
    <?php
    }
    ?>
  
 
   
  
</body>
</html>
