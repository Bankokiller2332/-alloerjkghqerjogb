<?php
    include "./CLASSES/ALBUM/album.php";
    include "./CLASSES/USER/user.php";


    //$album_list = Album::create_album_list($_SESSION["userID"]);
    $album_list = Album::create_album_list_all();
?>

<h3 class="my-4">Billboard</h3>
<?php
    foreach($album_list as $album){
        $album->display_album();
        $id = $album->get_id();
        $title = $album->get_title();
        $description = $album->get_description();
        $proprio = $album->get_proprietaire();

        $user = new User();
        $user->load_user_by_name($proprio);

        $idDuProprio = $user->get_id();
        echo "<div class='card bg-dark mb-4'>";
        echo "<div class='card-header text-left '><a href='displayalbum.php?albumID=$id&albumTitle=$title&description=$description'><h5>$title</h5></a>";
        echo "</div>"; 
        if(isset($_SESSION["userID"]))
        {
            if($idDuProprio == $_SESSION["userID"])
            {
                echo "<a href='./DOMAINLOGIC/supprimerAlbum.dom.php?albumID=$id'>Supprimer</a>";
            }
        }
        echo "</div>";
        echo "<div class='btn-group-toggle mb-3' data-toggle='buttons'>";
        echo "<label class='btn btn-primary active btn-outline-light'>";
        echo "<input type='checkbox' checked autocomplete='off'> like";
        echo "</label>";
        echo "</div>";
    }
  
?>
