<?php
    include __DIR__ . "/../CLASSES/COMMENT/comment.php";
    include __DIR__ . "/../UTILS/sessionhandler.php";

    session_start();

    if(!validate_session()){
        header("Location: ../error.php?ErrorMSG=not%20logged%20in!");
        die();
    }

    if(!isset($_POST["content"])){ //|| !isset($_POST["threadID"]) || !isset($_POST["threadTitle"])){
      header("Location: ../error.php?ErrorMSG=Bad%20Request");
      die();
    }

    //$threadTitle = $_POST["threadTitle"];
    //variables needed to create a post
    $auteurID = $_SESSION["userID"];
    $id = $_POST["commentID"];
    $content = $_POST["content"];
    $typeObjet = $_POST["typeObjet"];

    $comment = new comment();

    if(!$comment->add_comment($typeObjet, $auteurID, $id, $content)){
       
      //header("Location: ../error.php?ErrorMSG=Bad%20Request");
      die();
    }

    $ancienURL = $_SERVER['HTTP_REFERER'];
    header("Location:$ancienURL");
    die();

 ?>
