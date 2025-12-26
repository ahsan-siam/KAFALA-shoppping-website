<?php
session_start();

echo "logged in User : ". $_SESSION['username']."<br>";
echo "PRODUCT : ". $_SESSION['pid'];

?>
<html>
<title>DELETE your product</title>
 <body background="util/pic1.jpg" style="background-size:cover">
	<center>
	
        <h1>Finalize</h1>
        <form action="" method="post">
         <br><br>
         <label"> stock</label><br>
        <input type="number" name ="stock"><br><br>

        <label">size</label><br>
        <input type="text" name ="size"><br><br>

        <label"> color</label><br>
        <input type="text" name ="color"><br><br>


        <input type="submit" name ="confirm" value="INSERT">
        
        
        </form>
        <input type="submit" name ="preview" value="PREVIEW"><br><br>
	</center>
        
</body>
</html>

<?php


if(isset($_POST["preview"])==true){
        header('Location: http://localhost/kafala/preview.php',true,303);
}

if(isset($_POST["confirm"])==true){
        $pid = $_SESSION['pid'];           //product id 
        $size = $_POST['size'];
        $stock = $_POST['stock'];
        $color = $_POST['color'];
        
        
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
        
        echo '<br>PRODUCT ID: '.$pid ;
        
        $sql = "INSERT INTO `stock`(`pid`, `size`, `color`, `stock`) VALUES ('$pid','$size','$color','$stock');";
        
        if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
          
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
    }
    

?>