<form action="" method="post">
<input type="submit" name="click_button" value="Click..">
</form>
<?php
$clicks = 0;
echo $clicks;

if (isset($_POST['click_button'])) {
    $clicks = $clicks + 1;
}