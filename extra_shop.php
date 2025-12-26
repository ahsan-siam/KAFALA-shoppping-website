<?php
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

  $product_count=1; // PRIORITY COUNT


  for($i=0;$i<4;$i++){
    
  $pid1_price;
  $sql = "SELECT pid,price FROM product WHERE priority=$product_count";
  $result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()){
     $pid1[$i] = $row["pid"];
     $pid1_price[$i] = $row["price"];
    // echo $pid1[$i];
  }
} else {
  echo "0 results";
}
$sql2 = "SELECT photo_id FROM pictures WHERE pid='$pid1[$i]'"; // img location
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
  // output data of each row
  while($row2 = $result2->fetch_assoc()){
     $img_id[$i]= $row2["photo_id"];
    // echo $img_id[$i];
  }
}
$product_count+=1;
  }



$conn->close();


?>

<html>
    <head>
        <link rel="stylesheet" href="style.css" />    
    </head>
    <body style="background-color:#c6c6c6">
   
    <div>
        <div class="container">
            <form action="">
                <input type="text" placeholder="what?.....">
                <button type="submit">search</button>
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

        <a href="product_onclick.php?varname=<?php echo $pid1[0]; ?>">
        <div style="position:absolute; 
        left:250px ;top:200px; 
        border: 1px solid black;
        padding: 1px;
        margin: 2px;" >
            <img src="products/<?php echo $img_id[0];?>" style="height:200px; width:190px">
            <center>
            <h3>Men's Tshirt</h3>
            <p style="font-weight: bold"> Price <?php echo $pid1_price[0] ; ?> /=</p>
            <button id="b1" style="color: green" > BUY NOW</button>                
            </center>
           

        </div>
        </a>

        <a href="product_onclick.php?varname=<?php echo $pid1[1]; ?>">
        <div style="position:absolute; 
        left:550px ;top:200px; 
        border: 1px solid black;
        padding: 1px;
        margin: 2px;" >
            <img src="products/<?php echo $img_id[1];?>"style="height:200px; width:190px">
            <center>
            <h3>Men's Tshirt</h3>
            <p style="font-weight: bold"> Price <?php echo $pid1_price[1] ; ?>/=</p>
            <button id="b1" style="color: green" > BUY NOW</button>                
            </center>
           

        </div>
        </a>

        <a href="product_onclick.php?varname=<?php echo $pid1[2]; ?>">
        <div style="position:absolute; 
        left:850px ;top:200px; 
        border: 1px solid black;
        padding: 1px;
        margin: 2px;" >
            <img src="products/<?php echo $img_id[2];?>"style="height:200px; width:190px">
            <center>
            <h3>Men's Tshirt</h3>
            <p style="font-weight: bold"> Price <?php echo $pid1_price[2] ; ?>/=</p>
            <button id="b1" style="color: green" > BUY NOW</button>                
            </center>
           

        </div>
        </a>

        <a href="product_onclick.php?varname=<?php echo $pid1[3]; ?>">
        <div style="position:absolute; 
        left:1150px ;top:200px; 
        border: 1px solid black;
        padding: 1px;
        margin: 2px;" >
            <img src="products/<?php echo $img_id[3];?>"style="height:200px; width:190px">
            <center>
            <h3>Men's Tshirt</h3>
            <p style="font-weight: bold"> Price <?php echo $pid1_price[3] ; ?>/=</p>
            <button id="b1" style="color: green" > BUY NOW</button>                
            </center>
           

        </div>
        </a>

        <?php //.................2nd row --->> //
        ?>

        




    <div class="sidebar" >
        <img src="util/kafala_logo.jpg" style="width:200px ; height:80px"  >
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
   
    
  
 
   
  
</body>
</html>
