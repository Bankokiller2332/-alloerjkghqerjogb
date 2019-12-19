<?php
    include_once "./CLASSES/ALBUM/album.php";
    include_once "./CLASSES/USER/user.php";


    //$album_list = Album::create_album_list($_SESSION["userID"]);
    $album_list = Album::create_album_list($_GET["usagerID"]);
    $username = $_GET["userName"];

    echo "<h3 class='my-4'>Albums de $username</h3>";

    foreach($album_list as $album){
        $album->display_album();
        $id = $album->get_id();
        $title = $album->get_title();
        $description = $album->get_description();
        $proprio = $album->get_proprietaire();
        $typeObjet = "album";

        $user = new User();
        $user->load_user_by_name($proprio);

        $idDuProprio = $user->get_id();
        echo "<div class='card bg-dark mb-4'>";
        echo "<div class='card-header text-left '><a href='./displayalbum.php?albumID=$id&albumTitle=$title&description=$description'><h5>$title</h5></a>";
        echo "</div>"; 
        if(isset($_SESSION["userID"]))
        {
            if($idDuProprio == $_SESSION["userID"])
            {
                echo "<a href='./DOMAINLOGIC/supprimerAlbum.dom.php?albumID=$id'>Supprimer</a>";
            }
        }
        include "./DOMAINLOGIC/showCommentaire.dom.php";
        include "afficherCommentaireView.php";
        echo "</div>";
    }
?>