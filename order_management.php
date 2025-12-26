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
        


     <?php
 $query = "SELECT order_id,customer_name,number,location,gross_amount,confirm,confirmed_by,order_date,order_status,req,done FROM customer;";

if ($result = $conn->query($query)) {
    echo '<table style="border:4px solid;position:absolute;left:250px;top:350px;width: 80%;">';
    echo "<thead> <th>ID </th> <th> Name </th> <th> Number </th><th> Address</th>
    <th> Amount</th><th> Statuss</th><th> Approved By</th><th> Date</th><th> Delivery</th><th> Action</th><th style='text-allignment:center;'> Requests</th>";
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
        $field9name = $row["req"];
        $field10name = $row["done"];
        echo "<tr>";
        echo "<td>$field0name </td> <td> $field1name</td> <td> $field2name</td> <td>$field3name</td> 
        <td>$field4name </td><td> $field5name </td>  <td> $field6name </td>  <td> $field7name </td> <td> $field10name </td> 
        <td> $field8name </td> <td>"; 
        if($field10name==0){
            echo " <a href='order_manage_opt/approve.php?varname=$field0name'><button>Approve</button></a></td>
            <td> <a href='order_manage_opt/delivered.php?varname=$field0name'><button>Delivered</button></a></td>
           <td> <a href='order_manage_opt/delete.php?varname=$field0name'><button>DELETE</button></a></td><td> $field9name </td> ";
        }
    }
    echo "</tr>";
 echo "</tbody></table>";
    
}
                        ?>
    </body>
</html>
