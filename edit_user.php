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
$logged_in_user=  $_SESSION['username'];
echo "current user > ".$logged_in_user;
$sql= "select name,phone from employee where id= $logged_in_user;";
$sql2= "select pass from login where id= $logged_in_user;";

$result = $conn->query($sql);

if ($result = $conn->query($sql)) {
   
    while ($row = $result->fetch_assoc()) {
       
        $name = $row["name"];
        $phone = $row["phone"];
      
    }
}
if ($result = $conn->query($sql2)) {
   
    while ($row = $result->fetch_assoc()) {
       
        $pass = $row["pass"];
        
    }
}

?>

<html>
    <body>
        <title>User Account Settings</title>
       <center>
       <form action="edit_user_cache.php" method= "post"> <br>
           <label> PHONE</label> <input type="text" value="<?php echo $phone; ?>" name="phone"><br><br>
           <label> NAME</label> <input type="text" value="<?php echo $name; ?>" name="name"><br><br>
           <label> PASSWORD</label> <input type="password" value="<?php echo $pass; ?>" name="n_pass"><br><br>
           <label> Current PASSWORD</label> <input type="password"  name="c_pass"><br><br>
           <input type="submit" value="change">
        </form>
       </center>
    </body>
</html>