<?php
session_start();

session_destroy();
header('Location: http://localhost/kafala/home.html',true,303);
?>
