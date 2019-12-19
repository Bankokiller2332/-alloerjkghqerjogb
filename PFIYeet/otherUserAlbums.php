<?php
    session_start();   
    $username = $_GET["userName"];
    $title="Albums de $username";

    $content = array();
    array_push($content, "otherUserAlbumView.php");
    require_once __DIR__ . "/HTML/masterpage.php";

?>