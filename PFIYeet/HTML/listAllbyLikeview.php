<?php
    include "CLASSES/ALBUM/album.php";

    //$album_list = Album::create_album_list($_SESSION["userID"]);
    $album_list = Album::create_album_list_all();
?>

<h3 class="my-4">Billboard</h3>
<?php
    foreach($album_list as $album){
        $album->display_album();
    }
?>
