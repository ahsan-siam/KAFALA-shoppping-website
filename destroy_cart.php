<?php
session_start();
$_SESSION['cart'];
session_destroy();
header('Location: http://localhost/kafala/shop.php',true,303);

?>