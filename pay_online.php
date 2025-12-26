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
  
  <body style="background-image: url('util/bg1.jpg'); background-repeat: no-repeat;
  background-size: cover;">
    
  <form  style="allign:center;border:1px solid;border-radius:10px;height:220px;width:310px;"method="post">
      <label >  </label><input style="border-radius:7px;height:40px;width:280px;position:absolute;top:25px;left:20px;float:right;" type="text" name="id" placeholder="id"><br><br>
      <label> </label><input style="border-radius:7px;height:40px;width:280px;position:absolute;top:76px;left:20px;float:right;" type="password" name="pass" placeholder="pass"><br><br>
      <input style="background-color:c5972b;position:absolute;top:76px;left:20px;top:150px;border-radius:7px;height:40px;width:280px;"type="submit" name="go" value="SIGN IN"><br><br>
  </form>
      <?php if(isset($_POST["go"])){
        echo "GO";
        $id=  $_POST['id'];
        $pass=$_POST['pass'];
        echo $id ;
        $_SESSION["cus_id"]=$id;
        echo $pass;

        $sql1= "select pass from cus_login where id='$id' ;" ;

        $result =mysqli_query($conn,$sql1) or die("query failed");
        $row = mysqli_fetch_assoc($result);
        //print_r($row);
        //echo $row['pass']."";
        if($pass== $row['pass'].""){


      ?>
       <?php $amount=$_GET["price"] ;
    echo $amount;?>
    <label >COMPLETE THE FORM TO CONTINUE</label>
<form action="pay_online2.php" method="POST">
     <input style="position:absolute;top:500px;left:20px" type="text" name="name" placeholder="Name" ><br><br>
      <input style="position:absolute;top:540px;left:20px"type="text" name="phone" placeholder="Phone Number"><br><br>
      <input style="position:absolute;top:600px;left:20px"type="text" name="address" placeholder="Address"><br><br>
 <input type="hidden" name="gross" value="<?php echo $amount; ?>" ><br>

 <div style="font-family:arial;position:absolute;top:680px;left:10px;font-size:20px;color:black">   <?php echo "  $amount/- BDT";?></div>
 
  <input style="position:absolute;top:680px;left:130px;background-image: url('util/pay.png');height:50px;width:150px" type="submit" name="CONFIRM ORDER" value="" >
       
</form>
<?php
      }
      else
      echo "Incorrect Password";
    };
      ?>
  
    </body>

   
</html>