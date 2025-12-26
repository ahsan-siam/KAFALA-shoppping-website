<?php
session_start();

echo "logged in User : ". $_SESSION['username']."<br>";

?>
<html>
<title>Finalize your product</title>
 <body background="util/frontfig.jpg" style="background-size:cover">
        <center>
		<h1>Finalize</h1>
        <form action="" method="post">
         <br><br>
         <label> ENTER ID </label><br>
        <input type="number" name ="pid"><br><br>


        <input type="submit" name ="del" value="DELETE">
        
        
        </form>
        
		</center>
        
</body>
</html>

<?php



if(isset($_POST["del"])==true){
        $pid = $_POST['pid'];           //product id 
       
        
        
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
        
        $sql = "delete from product where pid=$pid";
		$sql2 = "delete from pictures where pid=$pid";
		$sql3 = "delete from stock where pid=$pid";
    $sql4 = "delete from description where pid=$pid";
		
        
        if ($conn->query($sql) === TRUE) {
          echo "New record DELETED successfully";
          
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
		
		if ($conn->query($sql2) === TRUE) {
          echo "New record DELETED successfully";
          
        } else {
          echo "Error: " . $sql2 . "<br>" . $conn->error;
        }
		
		if ($conn->query($sql3) === TRUE) {
          echo "New record DELETED successfully";
          
        } else {
          echo "Error: " . $sql3 . "<br>" . $conn->error;
        }
        if ($conn->query($sql4) === TRUE) {
          echo "New record DELETED successfully";
          
        } else {
          echo "Error: " . $sql4 . "<br>" . $conn->error;
        }
    
    }
    

?>