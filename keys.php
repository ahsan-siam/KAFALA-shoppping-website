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
    <body style="background-image: url('util/manage_orders.jpg');background-repeat: no-repeat;
  height:100%;width:100%;position:fixed;
    top:0;
    bottom:0;
    left:0;
    right:0;">
        

      <div style="position:absolute;top:100px;left: 750px;"> <center><a href="keys/set_new.php"><button style="radius:4px;height:55px;width:220px;font-family:san-serif"> SET KEY </button></a></center></div>
     <?php
 $query = "SELECT id,words FROM keywords;";

if ($result = $conn->query($query)) {
    echo '<table style="border:4px solid;position:absolute;left:250px;top:350px;width: 70%;">';
    echo "<thead> <th>SL </th> <th> ID </th> <th>WORDS </th><th>action</th>";
    /* fetch associative array */
    $i=1;
    while ($row = $result->fetch_assoc()) {
      
        $field0name = $row["id"];
        $field1name = $row["words"];
        
        echo "<tr>";
        echo "<td><center>$i</td><td><center>$field0name </center></td> <td> <center>$field1name</center></td>
        <td><a href='keys/keys_cache2.php?varname=$field0name'><button>EDIT</button></td> ";
        $i=$i+1;
    }
    echo "</tr>";
 echo "</tbody></table>";
    
}
                        ?>

                       
    </body>
</html>
