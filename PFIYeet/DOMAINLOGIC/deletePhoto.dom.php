<?php
include "../CLASSES/IMAGE/image.php";
Image::delete_by_id($_GET["imageID"]);
$ancienUrl = $_SERVER['HTTP_REFERER'];
header("Location: $ancienUrl");
die(); 
?>