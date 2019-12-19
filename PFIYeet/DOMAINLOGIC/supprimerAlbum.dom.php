<?php
    include "../CLASSES/ALBUM/album.php";
    include "../CLASSES/COMMENT/comment.php";
    $id = $_GET["albumID"];
    Album::delete_album($id);
    $ancienUrl = $_SERVER['HTTP_REFERER'];
    comment::delete_by_target_id($_GET['albumID']);
    header("Location: $ancienUrl");
    die();   
?>