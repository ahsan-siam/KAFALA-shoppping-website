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

      $name=  $_POST['name'];
      $num=$_POST['phone'];
      $add=$_POST['address'];
      $gross=$_POST['gross'];
      echo $name;
      foreach ($_SESSION['cart'] as $key =>$value) {
      
        echo"
            <center>Product:$value[Item]    Price: $value[price]</center><br>
        ";
    }
      ?>
      <html>
        <body>
          
      <form action="confirm_order.php" method="post">
      <input style="position:absolute;left:20px"type="text" name="id" placeholder="id"><br><br>
      <input style="position:absolute;left:20px"type="text" name="pass" placeholder="pass"><br><br>

      <input type="hidden" name="name"      value="<?php echo $name ; ?>" ><br><br>
      <input type="hidden" name="phone"     value="<?php echo $num ; ?>"><br><br>
      <input type="hidden" name="address"   value="<?php echo $add ; ?>" ><br><br>
      <input type="hidden" name="gross"     value="<?php echo $gross ; ?>"><br><br>

      <input style="position:absolute;left:20px"type="submit" name="go"><br><br>
      </form>

        </body>
      </html>
      <?php

      $id= $_POST["id"];
      $pass= $_POST["pass"];

      if(isset($_POST["go"])){
       
       echo $gross;
      }
      else 
      echo "f";
      ?>