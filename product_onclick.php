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

 $pid=$_GET['varname']; 
 $desc;
 $price;
 $type;
 $cat;
 $rating;
 $stock;
 $_SESSION['pid']= $pid;
 $sql = "SELECT `pid`, `price`, `stock`, `rating`, `gender`, `type`, `category`, `priority` FROM `product` WHERE pid='$pid'";
 $result = $conn->query($sql);

 $sql2 = "select photo_id from pictures where pid= $pid";
 $result2 = $conn->query($sql);
 $sql2 = "select photo_id from pictures where pid= $pid";
 $result2 = $conn->query($sql2);
 $sql3 = "select passage from description where pid= $pid";
 $result3 = $conn->query($sql3);

if ($result2->num_rows > 0) {
 // output data of each row
 while($row = $result2->fetch_assoc()){
    $image=$row["photo_id"];
 }
}
if ($result->num_rows > 0) {
 // output data of each row
 while($row = $result->fetch_assoc()){
    
 $price=$row["price"];
 $type=$row["type"];
 $cat=$row["category"];
 $rating=$row["rating"];
 $stock=$row["stock"];
   // echo $pid1[$i];
 }
} else {
 echo "0 results";
}

if ($result3->num_rows > 0) {
    // output data of each row
    while($row = $result3->fetch_assoc()){
       $desc=$row["passage"];
    }
}

?>
<html>
    <head>
        <link rel="stylesheet" href="style.css" />    
        <link rel="stylesheet" href="onclickbtn.css" />  
    </head>
    <body style="  background-image: url('Update_version/n2.jpg');
    background-repeat: no-repeat;
    background-size: cover;">
    <div class="container">
            <form action="">
                <input type="text" placeholder="what?.....">
                <button type="submit">search</button>
            </form>
           

        </div>
        
    <nav >
    <a href="shop.php"><img src="Update_version/logo.jpg" style="width:200px ; height:86px"  ></a>   
           
            <ul>
                <li><a class="active" href="http://localhost/kafala/">HOME |</a>
                    <li><a href="http://localhost/kafala/about_us.php">About us |</a>
                        <li><a href="#">Contact | </a>
                            <li><a href="#">More | </a>
            </ul>
            
        </nav>
        <style>
            
            *{
                padding: 0;
                margin: 0;
                text-decoration: none;
                list-style: none;
            }body{
                font-family: monsterrat;
            }
            nav{
              
                height: 50px;
                width: 100%;
            }
            nav ul{
                float: right;
                line-height:8-px ;
                margin:0 5px
            }
            nav ul li{
                display: inline-block;
                line-height:80px;
                margin: 0 8px;
            }
            nav ul li a{
                color: black;
                font-size: 20px;
                border-radius:10px ;
                text-transform: uppercase;
            }
            a.active,a:hover{
                background: #f6f7f8;
                color: black;
                transtition: 0.5s;
            }

          

        </style>
        <div class="sidebar" >
        
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

    <div style="position:absolute; 
        left:250px ;top:190px; 
        border: 1px solid black;
        padding: 1px;
        margin: 2px;"><img src="products/<?php echo $image; ?>" style="height:500px; width: 800px;">

    </div>
    <div style="position:absolute; 
        left:1150px ;top:190px; 
        border: 1px solid black;" class="onclickbtn">
        <h1>Product #id :<?php echo $pid  ; ?></h1>
        <h2> Type: <?php echo $type  ; ?></h2>
        <h3> Category :<?php echo $cat  ; ?> </h2>
        <h3> Price :<?php echo $price  ; ?> BDT /-</h3>
        <h3> Rating :<?php echo $rating  ; ?> </h2></br>
        
        <form style="width: 350px;height: 300px;border:0px" action="add2cart_cache.php" method="POST">
            <div>
            <input type="hidden" name="product_id" value="<?php echo $pid ?>">
            <input type="hidden" name="price" value="<?php echo $price ?>">
            <label for="qnt"> Quantity</label><input type="number" name="qnt" value="1">
            <button style="background: url(Update_version/cart.jpg);border: 1px solid black;cursor:pointer; border-radius: 5px; border:1px solid;
            width:260px;height: 50px;" name="add" type="submit" value="" ></button>
        </div>
      
        </form>
       
        
        
        <h3> stock :<?php echo $stock  ; ?> </h2>
    </div>
    <div style="position:absolute; 
        left:250px ;top:740px; 
        ">
        <h3> Description</h3>
        <p> <?php echo $desc; ?> </p>
    </div>

    </body>
</html>