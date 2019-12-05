<?php
    include "./CLASSES/ALBUM/album.php";
    include "./CLASSES/IMAGE/image.php";

    $albumid = $_GET["albumID"];
    $albumTitle = $_GET["albumTitle"];

    $aAlbum = new Album();
    
    $Image = new Image();
    $lstImage = $Image->create_image_list($albumid); 

   // $lst = $aAlbum->load_image();
    echo "<h1> $albumTitle </h1>";
    foreach($lstImage as $img){
        $img->display();
    }
?>