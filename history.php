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
    <link rel="stylesheet" href="feed_nav.css">
  </head>
  <body style="  background-image: url('Update_version/n1.jpg');
    background-repeat: no-repeat;
    background-size: cover;">

<nav>
<a href="logged_in_shop.php" >   Home </a>
  <a href="fashionfeed.php"> Fashion Feed </a>
  <a href="#"> History </a>
  <a href="cart.php"> MyCart </a>
  <a href="Favourites.php"> Favourites</a>
</nav>
<a href="signout.php"><button style="border-radius:15px;
    background-image: url('Update_version/logout.jpg');background-size:cover;height:63;width:57;float:right;margin: 10px;"></button></a>


     <?php
     $id= $_SESSION['username'];
 $query = "SELECT order_id,customer_name,number,location,gross_amount,confirm,confirmed_by,order_date,order_status,done FROM customer Where customer_id=$id;";

if ($result = $conn->query($query)) {
    echo '<table style="border:4px solid;position:absolute;left:250px;top:250px;width: 70%;">';
    echo "<thead> <th>ORDER_ID </th> <th> Reciever </th> <th> Phone </th><th> Mailing Address</th>
    <th> Amount</th><th> Statuss</th><th> Approved By</th><th> Date</th><th> Delivery</th><th> STATUSS</th>";
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
      
        $field0name = $row["order_id"];
        $field1name = $row["customer_name"];
        $field2name = $row["number"];
        $field3name = $row["location"];
        $field4name = $row["gross_amount"];
        $field5name = $row["confirm"];
        $field6name = $row["confirmed_by"];
        $field7name = $row["order_date"];
        $field8name = $row["order_status"];
        $field9name = $row["done"];
        echo "<tr>";
        echo "<td>$field0name </td> <td> $field1name</td> <td> $field2name</td> <td>$field3name</td> 
        <td>$field4name </td><td> $field5name </td>  <td> $field6name </td>  <td> $field7name </td> 
        <td> $field8name </td><td>$field9name </td>  ";
        if($field9name==0){
            echo "<td>
            <a href='customer_interface_cache.php?oid=$field0name'><button>REQUEST CHANGE</button> </a></td>";
        }
    }
    echo "</tr>";
 echo "</tbody></table>";
    
}
                        ?>
    </body>
</html>
