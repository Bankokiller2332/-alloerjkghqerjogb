<?php
    include "CLASSES/ALBUM/album.php";

    $album_list = Album::create_album_list($_SESSION["userID"]);
?>

<h3 class="my-4">Mes Albums</h3>
<?php
    foreach($album_list as $album){
        $album->display_album();
        $id = $album->get_id();
        $title = $album->get_title();
        $description = $album->get_description();
        echo "<div class='card bg-dark mb-4'>";
        echo "<div class='card-header text-left '><a href='displayalbum.php?albumID=$id&albumTitle=$title&description=$description'><h5>$title</h5></a>";
        echo "</div>";
        echo "<a href='./DOMAINLOGIC/supprimerAlbum.dom.php?albumID=$id'>Supprimer</a>";
        echo "</div>";
      }
?>