<head>
    <link rel="stylesheet" href="feed_nav.css">
  </head>
  <body style="  background-image: url('Update_version/n1.jpg');
    background-repeat: no-repeat;
    background-size: cover;">

<div style="position:absolute;left:130;top:200px;height:100%;width:600px;border:1px solid">
<center><h1> MESSAGES</h1></center>

<?php 
 $hName='localhost'; // host name
 $uName='root';   // database user name
 $password='';   // database password
 $dbName = "kafala"; // database name
 $conn = mysqli_connect($hName,$uName,$password,"$dbName");
   if(!$conn){
       die('Could not Connect MySql Server:' .mysql_error());
   }
// FETCH BLOCK 1 : NAMES
$sql1 = "SELECT * FROM `messenger`group by conv_code";
$flag=0;
if ($result = $conn->query($sql1)) {
   ;
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
      $conversations[$flag]=  $row["conv_code"]-9999;

                 $sql2 = "SELECT name FROM  cus_login where id=$conversations[$flag]";
                if ($result2 = $conn->query($sql2)) {
   
                /* fetch associative array */
                while ($row2 = $result2->fetch_assoc()) {
               $conversations_name[$flag]=  $row2["name"];
                }

    // FETCH BLOCK 2: LAST TEXT AND TIME 

                $x=$row['conv_code'];
               
                $sql3 = "SELECT * FROM  messenger where conv_code=$x order by time desc limit 1";
                if ($result3 = $conn->query($sql3)) {
   
                /* fetch associative array */
                while ($row3 = $result3->fetch_assoc()) {
               $conversations_last_texts[$flag]=  $row3["text"];
               $conv_time[$flag]=  $row3["time"];


                }
              }
                
       $flag=$flag+1;


    }
    
}
print_r($conversations_last_texts) ;

}

// FETCHED ALL THE CONVERSATIONS CODES AND CONVERSATION NAME

?>
<?php $top=200; for($k=0;$k<$flag;$k++){ ?>
<div style="position:absolute;top:<?php echo $top;$top=$top+140; ?> ;left:4; height:100px;width:100%;background-color:F1FDFA">

<p style="line-height:0px"><b><?php echo $conversations_name[$k]." :";?></b>
<?php echo $conversations_last_texts[$k];?> <p style="float:right;"><?php echo $conv_time[$k];?></p></p>
  <form action="adminreply_cache.php" method="post">
<input type="text" placeholder="Reply..." name="reply">
<input type="submit" value="Reply" name="rpbtn">
<input type="hidden" value="<?php echo $conversations[$k]; ?>" name="conv_code"> 

  </form>
  <form action="" method="post">
  <input type="hidden" value="<?php echo $conversations[$k]; ?>" name="conv_code"> 
  <input type="hidden" value="<?php echo $conversations_name[$k]; ?>" name="name">
  <input type="submit" name="a" value="Conversation >>">

</form>
</div>
  <?php } // inbox part done left side?>

</div>






<?php 
if(isset($_POST['a'])){
?>

<div style="position:absolute;float:left;top:200px ;right:20px; height:100%;width:600px;border: 1px solid grey;">



<?php

$dial=$_POST["conv_code"];
$name=$_POST["name"];
 $dial=$dial+9999;
$query = "SELECT * FROM `messenger` where conv_code=$dial order by time asc";
$k=0;
if ($result = $conn->query($query)) {
   ;
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
      
        $field0name[$k] = $row["id"];
        $field1name[$k] = $row["text"];
        $field2name[$k] = $row["time"];
        
        $k++;


    }
    
}
?>

<h1> <?php echo $name ; ?></h1>


<div style="position:absolute; top:80px;left:10px;">

<?php
for($j=0;$j<$k;$j++){
  echo $field0name[$j]." :  ".$field1name [$j]." ,  ".$field2name[$j]."<br>"  ;
  echo "---------------------------------------------------------------";
        echo "<br>";
}

?>
Admin >
<form action="chatsentadmin.php" method="post">

<input type="text" name="chat">
<input type="submit" value="SEND" name="sent">
<input type="hidden" value="<?php echo $dial; ?>" name="code">

</form>

</div>

</div>


<?php } ?>
    </body>
    </html>