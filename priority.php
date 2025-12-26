<?php
session_start();

echo "logged in User : ". $_SESSION['username']."<br>";

?>
<html>
<title>Finalize your product</title>
 <body background="util/frontfig.jpg" style="background-size:cover">
        <center>
		<h1>SET PRIORITY</h1>
        <form action="" method="post">
         <br><br>
         <label> ENTER ID </label><br>
        <input type="number" name ="pid"><br><br>
		<input type="number" name ="priority"><br><br>
        <input type="submit" name ="del" value="DELETE">
        
        
        </form>
        
		</center>
        
</body>
</html>

<?php



if(isset($_POST["del"])==true){
        $pid = $_POST['pid'];           //product id 
		$priority= $_POST['priority'];
       
        
        
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
        
        $sql = "UPDATE product
				SET priority = $priority 
				WHERE pid = $pid;";
		
		
        
        if ($conn->query($sql) === TRUE) {
          echo "Priority set successful";
          
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
		
    
    }
    

?>