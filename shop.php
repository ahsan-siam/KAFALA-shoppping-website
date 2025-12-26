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


  $sqlc= "select inc from analytics;";
  $resultc =mysqli_query($conn,$sqlc) or die("query failed");
$rowc = mysqli_fetch_assoc($resultc);
$visit_count = $rowc['inc']."";
$visit_count=$visit_count+1;

$sqlc2= "UPDATE `analytics` SET `inc`='$visit_count' WHERE interface ='shop' " ;
  if ($conn->query($sqlc2) === TRUE) {} else {
    echo "Error: " . $sqlc2 . "<br>" . $conn->error;
  }


  $sql3 = "SELECT pid FROM product ";
  $result3 = $conn->query($sql3);
  $y=0; // count of total number of items

if ($result3->num_rows > 0) {
  // output data of each row
  while($row3 = $result3->fetch_assoc()){
    $y =$y+1;
  }
} else {
    echo "else [lbock]";
}



  $product_count=1; // PRIORITY COUNT


  
  
    
  $pid1_price;
  $sql = " SELECT pid,price,prod_name FROM product  ORDER BY up_time DESC;";
  $result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  $i=0;
  while($row = $result->fetch_assoc()){
     $pid1[$i] = $row["pid"];
     $pid1_price[$i] = $row["price"];
     $p_name[$i] = $row["prod_name"];
    // echo $pid1[$i];
    $i=$i+1;
  }
} else {
  echo "0 results";
}
for($i=0;$i<$y;$i=$i+1){

    $sql2 = "SELECT photo_id FROM pictures WHERE pid='$pid1[$i]'"; // img location
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
  // output data of each row
 
  while($row2 = $result2->fetch_assoc()){
     $img_id[$i]=$row2["photo_id"];
    // echo $img_id[$i];
    
    
  }
}
}
$product_count+=1;
 



$conn->close();


?>

<html>
    <head>
        <link rel="stylesheet" href="style.css" />    
    </head>
    <body style="background-color:white;
    background-image: url('Update_version/shop_back.jpg');
    background-repeat: no-repeat;
    background-size: cover;" >

    <div style="height:90px;width:500px;float:right;font-size:26px;color:white;">
    
    <a href="cart.php"><button style="background-image: url(util/cart2.jpg);position:absolute;left:500px;height: 66px;width: 191px;border:0px;"> </button></a>
<a  style="float:right;color:black" href="http://localhost/kafala/">HOME </a>
    <a style="float:right;color:black" href="http://localhost/kafala/about_us.php">About us |</a>
       <a style="float:right;color:black" href="#">Contact | </a>
       <a style="float:right;color:black" href="http://localhost/kafala/sign_in.php">Login | </a>

</div>
    <div>

    <div class="container">
        
            <form action="search_result.php" method="post">
                <input type="text" placeholder="Find what you are looking..." name="search">
                <input type="submit" value="search" >
            </form>
            <style>
                    *{

                        margin:0;
                        padding: 0;
                        font-family: 'Popins',sans-serif;
                        box-sizing: border-box;

                        }

                        .container{
                        height: 100vh;
                        display: flex;
                        position: absolute;
                        top: 110px;
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
        
        
       

        <?php
        $x = 0; // general counter, individual item counter, each items iteration ,each block
        $top =250;
        $left=250;
        $shift_counter=0;
        // GLOBAL...............
        
        while($x < $y) {
         //...
         if($x%4==0 && $x!=0){ // to increase the allignment, shift to next row
        $top = $top +360; // set next top
        $left =250; // set left 250
        }
        if($x%4!=0){    // FOR 1st item of next row cannot pixeled + 290
            $left =$left+290;
        }
        
          ?>
         

        <a href="product_onclick.php?varname=<?php echo $pid1[$x]; ?>">
        <div style="position:absolute; 
        left:<?php echo $left; ?>px ;top:<?php echo $top ?>px; 
        padding: 1px;
        margin: 2px;" >
         
            <img src="products/<?php echo $img_id[$x];?>" style="height:200px; width:190px">
            <center>
            <h3><?php  echo $p_name[$x];?></h3>
            <p style="font-weight: bold"> Price <?php echo $pid1_price[$x] ; ?> /=</p>
            <button id="b1" style="border:0px; height:20px;width:180px;color: green" > Buy Now</button><br><br>
            <button id="b1" style="border:0px;height:20px;width:180px;color: green" > Add to cart</button>               
            </center>
           

        </div>
        </a>

        <?php
        //......
          $x=$x+1;
        }
        
        ?>

        <?php //.................2nd row --->> //
        ?>

        




    <div class="sidebar" >
        <img src="Update_version/logo.jpg" style="width:250px ; height:86px"  >
        <ul >
            <li>
                <a href="custom_search.php?search=Men">
                    <i class="fas fa-server">
                        <span>MEN's WEAR</span>
                    </i>
                </a>
            </li>
            <li>
                <a href="custom_search.php?search=Women">
                    <i class="fas fa-server">
                        <span>WOMEN's </span>
                    </i>
                </a>
            </li>
            
            <li>
                <a href="custom_search.php?search=tshirt">
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
   

  
 
   
  
</body>
</html>
