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
      $phptime=time();
    $time=date('m', $phptime);
      echo "new page";
      echo $time;
      
      $SQL1= "SELECT  month,sales from analytics_graph order by month asc limit 1 ;";
      $result = $conn->query($SQL1);

      if ($result->num_rows > 0) {
      
      while($row = $result->fetch_assoc()){
         $month = $row["month"];
         echo " > ".$month ;
      }
      } else {
      echo "0 results";
      }
     if($time==$month){
        $sql2="select sum(gross_amount) as total,month(order_date) as month from customer where month(order_date)=$time " ;
        $result = $conn->query($sql2);
        if ($result->num_rows > 0) {
      
            while($row = $result->fetch_assoc()){
               $total = $row["total"];
               echo "new > ";
               echo $total;

            }
            } else {
            echo "0 results";
            }

            $sql3 = "UPDATE analytics_graph
            SET sales=$total
            WHERE month=$time;";
            if (mysqli_query($conn, $sql3)) {
                header('Location: http://localhost/kafala/admin_menu.php',true,303);
              } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }



     }
     if($time!=$month){
        $sql4="insert into analytics_graph values($time,'0') " ;
            
            if (mysqli_query($conn, $sql4)) {
                header('Location: http://localhost/kafala/admin_menu.php',true,303);
              } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }

            }

     
      
      ?>