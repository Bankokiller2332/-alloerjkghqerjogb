<?php
    include __DIR__ . "/../CLASSES/COMMENT/comment.php";
    include __DIR__ . "/../UTILS/sessionhandler.php";

    session_start();

    if(!validate_session()){
        header("Location: ../error.php?ErrorMSG=not%20logged%20in!");
        die();
    }

    if(!isset($_POST["content"])){ 
      header("Location: ../error.php?ErrorMSG=Bad%20Request");
      die();
    }
    $auteurID = $_SESSION["userID"];
    $content = $_POST["content"];
    $typeObjet = $_POST["typeObjet"];
    $targetID = $_POST["targetID"];

    $comment = new comment();

    if(!$comment->add_comment($typeObjet, $auteurID, $content, $targetID)){
       
      header("Location: ../error.php?ErrorMSG=Bad%20Request");
      die();
    }

    $ancienURL = $_SERVER['HTTP_REFERER'];
    header("Location:$ancienURL");
    die();

 ?>
