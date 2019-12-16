<?php
    include "../CLASSES/IMAGE/image.php";

    $description = $_POST["description"];
    $albumID = $_POST["albumID"];

    $media_file_type = pathinfo($_FILES['Media']['name'] ,PATHINFO_EXTENSION);
    $target_dir = "./PHOTOS/PROFILES/";
    $img_extensions_arr = array("jpg","jpeg","png","gif");    

    if(!empty($media_file_type))
    {
        if(!in_array($media_file_type, $img_extensions_arr)){
            header("Location: ../error.php?ErrorMSG=INVALID FILE TYPE");
            die();
        }  
         //creation d'un nom unique pour la "PATH" du fichier
        $path = tempnam("../PHOTOS/PROFILES", '');
        unlink($path);
        $file_name = basename($path, ".tmp");
        
        //creation de l'url pour la DB
        $url = $target_dir . $file_name . "." . $media_file_type;
        
        //deplacement du fichier uploader vers le bon repertoire (Medias)
        move_uploaded_file($_FILES['Media']['tmp_name'], "../" . $url);
    }

    $maPhoto = new Image();
    if(!$maPhoto->addImage($url,$albumID,$description)){
        header("Location: ../error.php?ErrorMSG=information pas correct");
    }
    header("Location: ../displayAlbum.php");
    die();

?>