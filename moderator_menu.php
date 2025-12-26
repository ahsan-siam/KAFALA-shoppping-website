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
<link rel="stylesheet" href="admin_btn.css">

    </head>
    <body background="util/admin_menu.jpg" style="background-size:cover">
    <a href="edit_user.php"><button style="position:absolute;top:40px;left:350;border-radius:5px;
    background-image: url('util/account_settings.jpg');height:43;width:107;"></button>  </a>

        <div style="position: absolute;top:200px;left:40px;">
			<a  class="neon-button" href="upload1.html">NEW PRODUCT </a><br><br>
			<a class="neon-button"  href="upload2.html">UPLOAD PICTURE </a><br><br>
			<a class="neon-button" href="delete_p.php">DELETE PRODUCT </a><br><br>
            <a class="neon-button" href="edit_product.php">EDIT PRODUCT </a><br><br>
			<a class="neon-button" href="priority.php">SET PRIORITY </a><br><br>
			<a class="neon-button" href="keys.php">ADD KEYS </a><br><br>
			<a class="neon-button" href="order_management.php">MANAGE ORDERS </a><br><br>
    </div>
        
		<div style="position: absolute;top:300px; left:510px; background-color:white;  height:400px;width: 840px;">
            
			
                <?php
                

    $sql3 = "SELECT notification,notification_title,time FROM notifications ORDER BY not_id DESC LIMIT 10;";
    
    $id;


$result = $conn->query($sql3);
$i=0;
if ($result = $conn->query($sql3)) {
   
    while ($row = $result->fetch_assoc()) {
      
        $not[$i] = $row["notification"];
        $not_title[$i] = $row["notification_title"];
        $not_time[$i] = $row["time"];
        $i=$i+1;   
        
    }
    
}
                
                ?>
                <table style="font-color:black">
  <tr>
    <th>title</th>
    <th>NOTIFICATION</th>
    <th>TIME</th>
  </tr>
 
  
           
            <?php for($j=0;$j<5;$j++){
                if($j%2==0){
                    echo "<tr><td style='background-color: #B2BEB5;color:black;font-size:15px;font-family: arial'>";
                echo $not_title[$j];
                echo "</td>";

                echo "<td style='background-color: #B2BEB5;color:black;font-size:15px;font-family: arial'>";
                echo $not[$j];
                echo "</td>";

                echo "<td style='background-color: #B2BEB5;color:black;font-size:15px;font-family: arial'>";
                echo $not_time[$j];
                echo "</td></tr>";
                }
                if($j%2!=0){
                    echo "<tr><td style='color:black;font-size:15px;font-family: arial'>";
                echo $not_title[$j];
                echo "</td>";

                echo "<td style='color:black;font-size:15px;font-family: arial'>";
                echo $not[$j];
                echo "</td>";

                echo "<td style='color:black;font-size:15px;font-family: arial'>";
                echo $not_time[$j];
                echo "</td></tr>";
                }

                if($j==4){
                    echo "</table>";
                }
                ?>
                
            
                <?php
                
            }?>
			</div>
        
    </body>
</html>