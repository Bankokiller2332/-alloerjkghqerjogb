<?php
    include "../CLASSES/ALBUM/album.php";
    $id = $_GET["albumID"];
    Album::delete_album($id);
    $ancienUrl = $_SERVER['HTTP_REFERER'];
    header("Location: $ancienUrl");
    die();   
?>