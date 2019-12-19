<?php 
    include "../CLASSES/COMMENT/comment.php";

    comment::delete_by_id($_POST["commentID"]);
    $ancienUrl = $_SERVER['HTTP_REFERER'];
    header("Location: $ancienUrl");
    die(); 

?>