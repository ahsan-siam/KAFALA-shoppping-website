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
      if(isset($_SESSION['username'])){
?>


<?php
 // CUMULATIVE CHART DATA


 
 $result_graph = $conn->query("select sales,month from analytics_graph");
  
 
 if ($result_graph->num_rows > 0) 
 {
     // OUTPUT DATA OF EACH ROW
     $i2=0;
     while($row_graph = $result_graph->fetch_assoc())
     {
       
         
        $sale[$i2]=$row_graph["sales"];
        $month[$i2]=$row_graph["month"];
             $i2=$i2+1;
             echo $i2;
             // retrived data from database
                
     }
 } 
 else {
     echo "0 results";
 }
 print_r($month);
 
 $dataPoints = array(
    array("y" => $sale[$i2-5], "label" => $month[$i2-5]),
    array("y" => $sale[$i2-4], "label" => $month[$i2-4]),
    array("y" => $sale[$i2-3], "label" => $month[$i2-3]),
    array("y" => $sale[$i2-2], "label" => $month[$i2-2]),
    array("y" => $sale[$i2-1], "label" => $month[$i2-1])
);  
 
?>



<html>
    <head>
<a href="refresh_monthly_chart.php"><button>REFRESH</button></a>
<link rel="stylesheet" href="slider.css">
            <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">
<script>
    //........ LINEAR GRAPH
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "MONTHLY SALES"
	},
	axisY: {
		title: "units(sale)"
	},
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 //.......... NAV PANEL
}
</script>
    </head>
    <body style="background-color :#001133">
    <a href="edit_user.php"><button style="position:absolute;top:40px;left:350;border-radius:5px;
    background-image: url('util/account_settings.jpg');height:43;width:107;"></button>  </a>
    <a href="signout.php"><button style="position:absolute;top:30px;left:460;border-radius:15px;
    background-image: url('util/signout.png');height:63;width:57;"></button></a>


<div style="background-color:black;height:100%;width:200px">
        <div style="position: absolute;top:200px;left:20px;color:white">
			<a   href="upload1.html">NEW PRODUCT </a><br><br>
			<a   href="upload2.html">UPLOAD PICTURE </a><br><br>
			<a  href="delete_p.php">DELETE </a><br><br>
            <a  href="edit_product.php">EDIT PRODUCT </a><br><br>
			<a  href="keys.php">ADD KEYS </a><br><br>
			<a  href="reg_admin.php">REGISTER </a><br><br>
			<a  href="order_management.php">MANAGE ORDERS </a><br><br>
            <a  href="chatboxadmin.php">Inbox </a><br><br>
    </div>
    </div>
    
    <div style="position: absolute;top:210px; left:310px; background-color:#19334d;  height:190px;width: 170px;border-radius:15px">

    <?php
    // LIVE COUNTER
    $sqlc= "select inc from analytics;";
      $resultc =mysqli_query($conn,$sqlc) or die("query failed");
    $rowc = mysqli_fetch_assoc($resultc);
    $visit_count = $rowc['inc']."";

    $sqlc2 ="SELECT COUNT(id) as total 
    FROM cus_login";

$resultc2 =mysqli_query($conn,$sqlc2) or die("query failed");
$rowc2 = mysqli_fetch_assoc($resultc2);
$total_accounts = $rowc2['total']."";
    ?>

        <p style="color:white">VISIT</p>
        <p style="float:right;color:white;font-family:Arial;"><font size="30px"><?php echo $visit_count; ?></font></p>

        <p style="color:white">  Registered<font style="float:right;padding:3px;"size="50px"> <?php echo "   ".$total_accounts; ?>
     </font></p>

      </div>
        
		<div style="position: absolute;top:440px; left:310px; background-color:#b3ccff;border-radius:15px; height:300px;width: 740px;">
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

        <table style="position:absolute;top:25px;font-color:white">
  <tr>
    <th style='background-color: #b3ccff;color:black;font-size:15px;font-family: arial'>SUBJECT</th>
    <th style='background-color: #b3ccff;color:black;font-size:15px;font-family: arial'>NOTIFICATION</th>
    <th style='background-color: #b3ccff;color:black;font-size:15px;font-family: arial'>TIME</th>
  </tr>
 
  
           
            <?php for($j=0;$j<5;$j++){
                if($j%2==0){
                    echo "<tr><td style='background-color: #f3e6ff;color:black;font-size:15px;font-family: arial'>";
                echo $not_title[$j];
                echo "</td>";

                echo "<td style='background-color: #f3e6ff;color:black;font-size:15px;font-family: arial'>";
                echo $not[$j];
                echo "</td>";

                echo "<td style='background-color: #f3e6ff;color:black;font-size:15px;font-family: arial'>";
                echo $not_time[$j];
                echo "</td></tr>";
                }
                if($j%2!=0){
                    echo "<tr><td style='background-color: #b3ccff;color:black;font-size:15px;font-family: arial'>";
                echo $not_title[$j];
                echo "</td>";

                echo "<td style='background-color: #b3ccff;color:black;font-size:15px;font-family: arial'>";
                echo $not[$j];
                echo "</td>";

                echo "<td style='background-color: #b3ccff;color:black;font-size:15px;font-family: arial'>";
                echo $not_time[$j];
                echo "</td></tr>";
                }

                if($j==4){
                    echo "</table> ";
                }
                ?>
                <?php
            }
        }
        else
        header('Location: http://localhost/kafala/kafala.html',true,303);
        ?>
			</div>
            <div style="position: absolute;top:440px; left:1110px; background-color:#001a33;  height:300px;width: 340px;border-radius:15px">
                
                <?php 
                
                ?>
            </div>
            <div id="chartContainer" style="position:absolute;top:210px;left:520px;height: 190px; width: 400;border-radius:45px"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<div class="container" style="position:absolute;top:305px;left:1100px;height:200;width:200">
    <div class="wrapper" style="height:200;width:200">
<img src="util/slide1.jpg" style="height:200;width:200" >
<img src="test/slide2.jpg" style="height:200;width:200" >
<img src="test/slide3.jpg" style="height:200;width:200" >
<img src="test/slide1.jpg" style="height:200;width:200" >

    </div>

</div>



    </body>
</html>