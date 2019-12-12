<?php
    include "../CLASSES/ALBUM/album.php";
    $id = $_GET["albumID"];
    Album::delete_album($id);
    header("Location: ../billboard.php");
    die();   
?>