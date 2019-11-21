<?php
    session_start();
    include "UTILS/sessionhandler.php";

    if(validate_session()){
        header("Location: error.php?ErrorMSG=Already%20Logged!");
        die();
    }

    $title = "Register";
    $module = "registerview.php";
    $content = array();
    array_push($content, $module);

    require_once __DIR__ . "/HTML/masterpage.php";

?>
