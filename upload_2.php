
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kafala";

// Create connection with database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";
?>
<html>
    <body background="util/pic1.jpg" style="background-size:cover">
        <title>upload</title>
        <center>
		<form action="upload2.php" method="post" enctype="multipart/form-data">
        

        <label for="text">enter product id 
    
    </label><br>
        <input type="number" name ="pid" placeholder=" Last updated:
        <?php
        $sql="SELECT * FROM `product` ORDER BY pid DESC LIMIT 1";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
               $pid1 = $row["pid"];
            }
          } else {
          }
          echo $pid1;
        ?>

        "><br><br>
        <input type="file" name ="pic"><br>
        <input type="file" name ="pic2"><br>
        <input type="file" name ="pic3"><br>
        <input type="file" name ="pic4"><br><br>
        <input type="submit" name ="up" value="upload photos"><br><br>
        
        
        </form>
		</center>

        
    </body>
</html>