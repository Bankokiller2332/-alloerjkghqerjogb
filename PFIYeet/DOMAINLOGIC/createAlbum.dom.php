<?php
    include "../CLASSES/ALBUM/album.php";

    session_start();

    $titre = $_POST["titre"];
    $description = $_POST["description"];
    $proprietaire = $_SESSION["userName"];
    var_dump($titre);
    var_dump($description);
    var_dump($proprietaire);
    $monAlbum = new Album();
    if(!$monAlbum->add_album($titre, $description,$proprietaire)){
        header("Location: ../error.php?ErrorMSG=information pas correct");
    }
    
    header("Location: ../billboard.php");
    die();
    

?>