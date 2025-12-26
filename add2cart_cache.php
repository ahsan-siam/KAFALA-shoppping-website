<?php
   
 
     
session_start();
$qnt=$_POST['qnt'];
$price_cache =$_POST['price'];
$price =$price_cache*$qnt;
      if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST['add'])){
            if(isset($_SESSION['cart'])){
                
                $count=count($_SESSION['cart']);
                 $_SESSION['cart'][$count]=array('Item'=>$_POST['product_id'],'price'=>$price,'qnt'=>$qnt);
                 print_r($_SESSION['cart']);
                 echo "<script> 
                window.location.href='cart.php';
                
                 </script>" ;
                
                }
            else{
            $_SESSION['cart'][0]=array('Item'=>$_POST['product_id'],'price'=>$price,'qnt'=>$qnt);
            print_r($_SESSION['cart']);
            echo "<script>
                 window.location.href='cart.php';
                 </script>";
            }
        }
        if(isset($_POST['Remove_Item'])){
            foreach ($_SESSION['cart'] as $key => $value) {
                if($value['Item']==$_POST['Item']){
                    unset($_SESSION['cart'][$key]);
                    $_SESSION['cart']=array_values($_SESSION['cart']);
                echo "<script>
                alert('item Removed');
                window.location.href='cart.php';
                </script>";
                
                }
            }
        }
    }
    /*
    
    $sql = "INSERT INTO `order`(`order_id`,`pid`, `price`, `confirm`,`confirmed_by`) 
    VALUES ('$order_id','$pid','$price','','')";
    
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
      header('Location: http://localhost/kafala/upload2.html',true,303);
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
      
    
    */
    

    

?>