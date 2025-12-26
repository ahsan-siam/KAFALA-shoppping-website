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


        <input type="submit" name ="FIND" value="FIND">
        
        
        </form>
        
		</center>
        


<?php



if(isset($_POST["FIND"])==true){
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
        
        echo '<br>PRODUCT ID: '.$pid.'<br>' ;
        
        $sql = "select price,stock,rating,gender,type,category from product where pid=$pid;";
        $sql2 = "select passage from description where pid=$pid";
		
		if ($result2 = $conn->query($sql2)) {
   
            while ($row2 = $result2->fetch_assoc()) {
              
                $desc = $row2["passage"];
            }
        }
        if ($result = $conn->query($sql)) {
   
            while ($row = $result->fetch_assoc()) {
              
                $price = $row["price"];
                $stock = $row["stock"];
                $rating = $row["rating"];
                $gender = $row["gender"];
                $type = $row["type"];
                $category = $row["category"];
    
    }
}

    

?>
 <div style="width:300px">
 <form action="" method="post">
 <input style="float:right" type="hidden" value="<?php echo $pid; ?>" name="pid"><br><br>
 <label>Price</label><input style="float:right" type="text" value="<?php echo $price; ?>" name="p"><br><br>
 <label>Stock</label><input style="float:right" type="text" value="<?php echo $stock; ?>" name="s"><br><br>
 <label>Rating</label><input style="float:right" type="text" value="<?php echo $rating; ?>" name="r"><br><br>
 <label>Gender</label><input style="float:right" type="text" value="<?php echo $gender; ?>" name="g"><br><br>
 <label>Type</label><input style="float:right"type="text" value="<?php echo $type; ?>" name="t"><br><br>
 <label>Category</label><input style="float:right" type="text" value="<?php echo $category; ?>" name="c"><br><br>
 <label>Description</label><br><br><input style="height:77px;width:300px;" type="text" value="<?php echo $desc; ?>" name="d"><br><br>
<input type="submit" value="Save Changes" name="change">
 </form>

 </div>

 <?php 
if(isset($_POST["change"])==true){

    $hName='localhost'; // host name
    $uName='root';   // database user name
    $password='';   // database password
    $dbName = "kafala"; // database name
    $conn = mysqli_connect($hName,$uName,$password,"$dbName");
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
      }


                $pid = $_POST["pid"];
                $p = $_POST["p"];
                $s = $_POST["s"];
                $r = $_POST["r"];
                $g = $_POST["g"];
                $t = $_POST["t"];
                $c = $_POST["c"];
                $desc = $_POST["d"];



    $sql3 = "update product
    set price=$p, stock=$s, rating=$r, gender='$g', type='$t', category='$c'
    where pid=$pid;";
		
    if ($result3 = $conn->query($sql3)) {
        echo "CHANGE SUCCESSFUL !";
    }
    else
        echo "BAD CONNECTION !";
    


}
}

?>


</body>
</html>