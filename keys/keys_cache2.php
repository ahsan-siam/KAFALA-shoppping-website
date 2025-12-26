<?php
$pid =$_GET['varname'];
echo $pid;
?>
<html>
    <body>
        <form action="keys_cache.php" method="post">
            
            <input placeholder="keywords..."type="text" value="" name="keys">
            <input type="hidden" value="<?php echo $pid; ?>" name="id">
            <input type="submit" value="done " name="done">
        </form>
    </body>
    </html>