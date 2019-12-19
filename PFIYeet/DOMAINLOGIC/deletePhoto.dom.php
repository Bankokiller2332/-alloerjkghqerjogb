<?php
include "../CLASSES/IMAGE/image.php";
include "../CLASSES/COMMENT/comment.php";
Image::delete_by_id($_GET["imageID"]);
comment::delete_by_target_id($_GET['imageID']);
$ancienUrl = $_SERVER['HTTP_REFERER'];
header("Location: $ancienUrl");
die(); 
?>