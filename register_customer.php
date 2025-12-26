<?php



?>

<html>
    <body background="util/frontfig.jpg" style="background-size:cover">
	<div style="width:440px;position:absolute;left:15px;top:50px;border:2px solid">
        <title>upload</title>
        <form action="register_customer_cache.php" method="post">
        

        <label style="font-family:arial;font-size: 15;">Name</label>
        <input placeholder=" Name" style="float:right;border: 1px solid #E0E2DF;border-radius: 5px;height: 35px;width: 240px;" type="text" name ="name"><br><br>
       <br/>
        
        <label style="font-family:arial;font-size: 15;"for="price"> Phone Number</label>
        <input placeholder="Phone"style="float:right;border: 1px solid #E0E2DF;border-radius: 5px;height: 35px;width: 240px;"type="number" name ="phone"><br><br>
        <br/>

        <label style="font-family:arial;font-size: 15;"for="desc">Password</label>
        <input placeholder="Pass"style="float:right;border: 1px solid #E0E2DF;border-radius: 5px;height: 35px;width: 240px;"type="text" name ="pass"><br><br>
        <br/>
      
       
        <input style="float:right;background-image: url('util/next.png');height:44px;width:150px;border-radius: 10px;"type="submit" name ="Submit" value=""><br/><br/>
        
        </form>
		

        </div>
    </body>
</html>