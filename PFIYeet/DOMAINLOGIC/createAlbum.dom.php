<?php
    include "../CLASSES/ALBUM/album.php";

    session_start();

    $titre = $_POST["titre"];
    $description = $_POST["description"];
    $proprietaire = $_SESSION["userName"];

    if(empty($titre) || empty($description)){
        header("Location: ../error.php?ErrorMSG=information pas correct");
        die();
    }
    $monAlbum = new Album();
    if(!$monAlbum->add_album($titre, $proprietaire,$description)){
        header("Location: ../error.php?ErrorMSG=information pas correct");
        die();
    }
    
    header("Location: ../billboard.php");
    die();
    

?>