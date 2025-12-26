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

?>
<html>
    <head>
        <title> Cart</title>
    </head>
	
    <body style="background-image: url('util/pic2.jpg'); background-repeat: no-repeat;
  background-size: cover;">
    <div style="position: absolute ;left : 110px ;top:130px;backdrop-filter: blur(5px);width840px;">
            <div class="row">
                <div class="col-lg-12 text-center border rounded bg-light my-5">
                    <h1>MY CART</h1>
                </div>
                <div class="col-lg-8"></div>
                <table style="background-color:DFF9F8;border:2px solid;width:840px;color:black">
  <thead style="text :center">
    <tr>
	<th></th>
      <th scope="SL">#</th>
      <th scope="Product">ID </th>
      <th scope="col">Price</th>
    </tr>
  
    <?php 


    $gross_amount=0;
    if(isset($_SESSION['cart'])){
$sl=0;
        foreach ($_SESSION['cart'] as $key =>$value) {
			$sl=$sl+1;
         //   print_r($value);
            $gross_amount=$gross_amount+$value['price'];


                $pp=$value['Item'];
            $sql2 = "SELECT photo_id FROM pictures WHERE pid=$pp"; // img location
            $result2 = $conn->query($sql2);

            if ($result2->num_rows > 0) {
                // output data of each row
 
                while($row2 = $result2->fetch_assoc()){
                $img_id=$row2["photo_id"];
    
    
                    }
                }
        echo"
        <tr>
		
            
			<td> <img src='products/$img_id' style='height:120px;width:120px'></td>
			<td>$sl</td>
            <td style='font-size: 20px;'><center>$value[Item]</center></td>
            <td style='font-size: 20px;'>$value[price]</td>
            <td>
            <td style='font-size: 20px;'>$value[qnt]</td>
            <td>
            <form action='add2cart_cache.php' method='post' >
            
            <input type='hidden' name='Item' value='$value[Item]'>
            </form>
            </td>
        </tr>
        
        
        ";
    }
    }
    
        
    ?>
    
 
         </tbody>
                 </table><br>
                 <form action="destroy_cart.php" method="post">
                <input type="submit" name="destroy" value= "DESTROY CART">
            </form>
             </div>
        </div>
       

        <div style="border-radius:10px;height:500px;width:300px;background-color:DFFFC4;position:absolute; left: 1200px;top:250;backdrop-filter: blur(5px);">

       <center> <h2 style="font-family:arial"> CONFIRM ORDER</h2></center>
            
<form action="login_bypass.php" method="POST">
     <input style="position:absolute;left:20px" type="text" name="name" placeholder="Name" ><br><br>
      <input style="position:absolute;left:20px"type="text" name="phone" placeholder="Phone Number"><br><br>
      <input style="position:absolute;left:20px"type="text" name="address" placeholder="Address"><br><br>

 <input type="hidden" name="gross" value="<?php echo $gross_amount; ?>" ><br>

 <div style="font-family:arial;position:absolute;top:280px;left:10px;font-size:20px;color:black">   <?php echo "  $gross_amount/- BDT";?></div>
   <input style="position:absolute;top:200px;left:130px;background-image: url('util/pay.png');height:50px;width:150px"type="submit" name="CONFIRM ORDER" value="" >
</form>
<a href="pay_online.php?price=<?php echo $gross_amount;?>"> <input style="border-radius:5px;position:absolute;top:270px;left:130px;background-image: url('util/pay_on.jpg');height:50px;width:150px"type="submit" name="CONFIRM ORDER" value="" >  </a>
        </div>
    </body>
</html>