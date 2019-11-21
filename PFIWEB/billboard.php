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

    if(isset($_GET["id"]))
    {
        $module = "displaythreadview.php";
        array_push($content, $module);
    }
    else{
        $module = "billboardview.php";
        array_push($content, $module);
    }
    require_once __DIR__ . "/HTML/masterpage.php";

?>
