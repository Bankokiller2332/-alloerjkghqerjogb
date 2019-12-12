<?php
    include "../CLASSES/ALBUM/album.php";
    include __DIR__ . "/../UTILS/sessionhandler.php";

    session_start();

    if(!validate_session()){
      header("Location: ../error.php?ErrorMSG=Not%20logged%20in!");
      die();
    }

    $title = $_POST["albumcreation"];


    if(empty("$title")){
      header("Location: ../error.php?ErrorMSG=bad%20request!");
      die();
    }

    $album = new Album();
    if(!$album->add_album($title,$proprietaire, $description)){
      header("Location: ../error.php?ErrorMSG=Bad%20request!");
      die();
    }

    $album->load_album_by_title($title);
    $albumID = $album->get_id();
    $albumDescription = $albumn->get_description();
    header("Location: ../displayalbum.php?albumID=$albumID&albumTitle=$title&description=$description");
    die();

?>
