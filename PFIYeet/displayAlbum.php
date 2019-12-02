<?php
  session_start();
  
  if(!isset($_GET["albumTitle"])){
    header("Location: error.php?ErrorMSG=Bad%20Request!");
    die();
  }

  $title=$_GET["albumTitle"];

  $content = array();
  array_push($content, ".php");

  require_once __DIR__ . "/HTML/masterpage.php";
?>
