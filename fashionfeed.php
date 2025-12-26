
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
    <body style="  background-image: url('Update_version/feed_bg.jpg');
    background-repeat: no-repeat;
    background-size: cover;">


<nav>
  <a href="logged_in_shop.php" >   Home </a>
  <a href="fashionfeed.php"> Fashion Feed </a>
  <a href="history.php"> History </a>
  <a href="cart.php"> MyCart </a>
  <a href="Favourites.php"> Favourites</a>
</nav>

<div style="float:right;height:40px;width:500px;margin: 10px;">
    
     <a href="signout.php"><button style="border-radius:15px;
    background-image: url('Update_version/logout.jpg');background-size:cover;height:63;width:57;float:right;margin: 10px;"></button></a>
     <a href="chatbox.php"><img style="float:right;height:40;width:100px;margin: 10px;" src="Update_version/chatbox.jpg" alt=""></a>
</div>

    <div style="position:absolute;left:100px;">
      <form style="position:absolute;top:130px;left:150;height:40px;width:900px;
      border: 1px solid grey; " action="customer_post.php" method="post" enctype="multipart/form-data">
       
      
      <input  style="height:30px;width:300px;" placeholder="Write whats on your mind.." name ="paragraph">
         <input type='file' name ='pic' >
         <input type="submit" value="POST">

      </form>
    </div>

    <div style="position:absolute;top:200px;left:200px;background-color: cyan;height:<?php echo $body_height ?>px;width:1000px">
        <div style="position:absolute;top:10px;left:40px;background-color: green ;height:290;width:460px">
        <?php
        $pidA;
        $sql1  = " SELECT pictures.photo_url as directory FROM product 
        INNER JOIN pictures on product.pid=pictures.pid where product.class= 'A' ;";
        $result = $conn->query($sql1);
      
      if ($result->num_rows > 0) {
        // output data of each row
        $i=0;
        while($row = $result->fetch_assoc()){
           $pidA[$i] = $row["directory"];
          
          // echo $pid1[$i];
          $i=$i+1;
        }
      } else {
        echo "0 results";
      }
        ?>
        <img src="<?php echo $pidA[rand()% $i];?>" style="height:100%;width:460px;filter: blur(8px); -webkit-filter: blur(8px);" >
            <h1 style="position:absolute;top:130;left:140;border: solid 1px;"> CLASS A</h1>


        </div>

        <div style="position:absolute;top:10px;left:510px;background-color: green ;height:290;width:450px">
        <?php
        $pidB;
        $sql2  = " SELECT pictures.photo_url as directory FROM product 
        INNER JOIN pictures on product.pid=pictures.pid where product.class= 'B' ;";
        $result = $conn->query($sql2);
      
      if ($result->num_rows > 0) {
        // output data of each row
        $i=0;
        while($row = $result->fetch_assoc()){
           $pidB[$i] = $row["directory"];
          
          // echo $pid1[$i];
          $i=$i+1;
        }
      } else {
        echo "0 results";
      }
        ?>
        <img src="<?php echo $pidB[rand()% $i];?>" style="height:100%;width:450px;filter: blur(8px); -webkit-filter: blur(8px);" >
            <h1 style="position:absolute;top:130;left:140;border: solid 1px;"> CLASS B</h1>

        </div>
    
        <div style="position:absolute;top:310px;left:40px;background-color: green ;height:220;width:350px">

        <?php
        $pidC;
        $sqla  = " SELECT pictures.photo_url as directory FROM product 
        INNER JOIN pictures on product.pid=pictures.pid where product.class= 'C' ;";
        $result = $conn->query($sqla);
      
      if ($result->num_rows > 0) {
        // output data of each row
        $i=0;
        while($row = $result->fetch_assoc()){
           $pidC[$i] = $row["directory"];
          
          // echo $pid1[$i];
          $i=$i+1;
        }
      } else {
        echo "0 results";
      }
      
      ?>

<img src="<?php echo $pidC[rand()% $i];?>" style="height:100%;width:460px;filter: blur(8px); -webkit-filter: blur(8px);" >
            <h1 style="position:absolute;top:80;left:140;border: solid 1px;"> CLASS C</h1>





        </div>
        
        <div style="position:absolute;top:310px;left:400px;background-color: green ;height:220;width:350px">


        <?php
        $pidd;
        $sqlD  = " SELECT pictures.photo_url as directory FROM product 
        INNER JOIN pictures on product.pid=pictures.pid where product.class= 'D' ;";
        $result = $conn->query($sqlD);
      
      if ($result->num_rows > 0) {
        // output data of each row
        $i=0;
        while($row = $result->fetch_assoc()){
           $pidD[$i] = $row["directory"];
          
          // echo $pid1[$i];
          $i=$i+1;
        }
      } else {
        echo "0 results";
      }
      
      ?>

<img src="<?php echo $pidD[rand()% $i];?>" style="height:100%;width:460px;filter: blur(8px); -webkit-filter: blur(8px);" >
            <h1 style="position:absolute;top:80;left:140;border: solid 1px;"> CLASS D</h1>




        </div>

        
        <div style="position:absolute;top:310px;left:760px;background-color: green ;height:220;width:200px">

        <?php
        $pidE;
        $sqle  = " SELECT pictures.photo_url as directory FROM product 
        INNER JOIN pictures on product.pid=pictures.pid where product.class= 'C' ;";
        $result = $conn->query($sqle);
      
      if ($result->num_rows > 0) {
        // output data of each row
        $i=0;
        while($row = $result->fetch_assoc()){
           $pidE[$i] = $row["directory"];
          
          // echo $pid1[$i];
          $i=$i+1;
        }
      } else {
        echo "0 results";
      }
      
      ?>

<img src="<?php echo $pidE[rand()% $i];?>" style="height:100%;width:200px;filter: blur(8px); -webkit-filter: blur(8px);" >
            <h1 style="position:absolute;top:80;left:50;border: solid 1px;"> CLASS E</h1>



        </div>

        
        
        <?php 
                // >>>>>>>>>>>>>>>>>>     POST  

                  $q1= " SELECT cus_login.id as id ,
                  cus_login.name as name, 
                  posts.post_id as post_id,
                  posts.title as title ,
                  posts.title as title ,
                  posts.time as posted ,
                  posts.photo_url as photo , 
                  SUBSTRING(posts2.paragraph, 1, 250)  as article 
                  FROM cus_login inner join posts on cus_login.id= posts.customer_id
                  join posts2 on posts.post_id= posts2.post_id order by time asc ";

$i=0;
if ($result = $conn->query($q1)) {
   
    while ($row = $result->fetch_assoc()) {
      
        $user_id[$i] = $row["name"];
        $user_name[$i] = $row["name"];
        $post_id[$i] = $row["post_id"];
        $post_title[$i] = $row["title"];
        $post_time[$i] = $row["posted"];
        $post_article[$i] = $row["article"];
        $post_url[$i] = $row["photo"];
        
        
        
        $i=$i+1;   
    }
}

            ?>


        <?php 
                // >>>>>>>>>>>>>>>>>>>>>>>>>    POST 
                $k=0;
               //  print_r($post_url);
            
            
            // DISPLAY POST START

            
            
            $top_margin=570;
            $final= $i;
            for($t=0;$t<$final;$t++){
             
            ?>



              
            <div style="position:absolute;top:<?php echo $top_margin; $top_margin=$top_margin+240;?>px ;
            left:40px;background-color: white ;height:220;width:900px;">
            <img src="<?php  echo $post_url[$k] ;  ?>" style="position:absolute;left:10px;top:10px;border-radius:3px;height: 200px ;width:200px;border: 1px solid grey;">
          <div style="position:absolute;left:240px;">
          <h1 style="line-height:1%;"><?php echo $post_title[$k];?></h1>
          <p style="color:grey"> Posted By <?php echo $user_name[$k].", ".$post_time[$k] ;?></p>
        </div>
          <div style="position:absolute;left:240px;top:50px">
          <p> <?php echo $post_article[$k] ;?></p>
          <a style="postion:absolute;bottom:2px;float:right;" href="post_load.php?id=<?php echo $post_id[$k]; ?>"> See full post -></a>     
          <?php $k++; ?>
          </div> 
                

        </div>

        <?php  } ?>


        

    </div>
   
        
    </body>
</html>