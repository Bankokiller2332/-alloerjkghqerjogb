<?php
  session_start();
  
  if(!isset($_GET["albumTitle"])){
    header("Location: error.php?ErrorMSG=Bad%20Request!");
    die();
  }

  $title=$_GET["albumTitle"];
  $id = $_GET["albumID"];

  $content = array();
  array_push($content, "showImageAlbumview.php");

  require_once __DIR__ . "/HTML/masterpage.php";
  var_dump($_GET);
?>
