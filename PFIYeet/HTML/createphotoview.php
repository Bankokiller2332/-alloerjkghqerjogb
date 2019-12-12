<?php
    include "./CLASSES/USER/user.php";

    $user = new User();
    $monAlbum = new Album();
    $idAlbum = $_GET["albumID"];
    $monAlbum->load_album_by_id($idAlbum);
    $proprio = $monAlbum->get_proprietaire();
    $user->load_user_by_name($proprio);
    $idDuProprio = $user->get_id();

    if(isset($_SESSION["userID"]))
    {
        if($idDuProprio == $_SESSION["userID"])
        {
           include "ajouterImageview.php";
        }
        else
        {
        echo "<h1> tu ne peux pas ajouter de photos sur cette album";
        die();
        }
    }
    
 
    
?>