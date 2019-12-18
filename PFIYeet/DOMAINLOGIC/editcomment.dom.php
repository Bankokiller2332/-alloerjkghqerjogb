<?php
    include __DIR__ . "/../CLASSES/COMMENT/comment.php";
    include __DIR__ . "/../UTILS/sessionhandler.php";

    session_start();

    if(!validate_session()){
        header("Location: ../error.php?ErrorMSG=Not%20logged%20in!");
        die();
    }

    if(!isset($_POST["commentID"]) || empty($_POST['content'])){
        header("Location: ../error.php?ErrorMSG=Bad%20Requests!");
        die();
    }

    $comment = new comment();
    
    $comment->load_comment($_POST["commentID"]);
    var_dump($comment);
    if(!$comment->get_auteurID() == $_SESSION["userID"]){
        //header("Location: ../error.php?ErrorMSG=Bad%20Requests!");
        //die();
    }

    $comment->set_content($_POST['content']);
    $comment->update();

   //header("Location: ../billboard.php");
    //die();
