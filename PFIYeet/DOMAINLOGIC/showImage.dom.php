<?php
    include "./CLASSES/ALBUM/album.php";
    include "./CLASSES/IMAGE/image.php";

    $albumid = $_GET["albumID"];
    $albumTitle = $_GET["albumTitle"];
    $albumDescription = $_GET["description"];

    $aAlbum = new Album();  
    $Image = new Image();
    $lstImage = $Image->create_image_list($albumid); 

   // $lst = $aAlbum->load_image();
    echo "<h1> $albumTitle </h1>";
    echo "<h4> $albumDescription</h4>";   
    if($_SESSION["userName"] == $lstImage)  
    foreach($lstImage as $img){
        $img->display();
    }
?>