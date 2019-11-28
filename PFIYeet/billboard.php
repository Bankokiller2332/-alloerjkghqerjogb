<?php
    session_start();
    include "UTILS/sessionhandler.php";

    $title = "billboard";
    if(validate_session()){
        $name = $_SESSION["userName"];
    }
    else{
        $name="Anon";
    }

    $content = array();
    $module = "billboardview.php";
    array_push($content, $module);
    
    require_once __DIR__ . "/HTML/masterpage.php";

?>
