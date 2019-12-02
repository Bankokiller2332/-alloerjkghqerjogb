<?php
include __DIR__ . "/../CLASSES/USER/user.php";
include "../CLASSES/MEDIA/media.php";
session_start();
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

        //create entry in database
        Media::create_entry('image', $url, 'image_de_profil');
    }
    else
    {
        $url = "./PHOTOS/PROFILES/DefaultProfileImage.jpg";
        Media::create_entry('image', $path, 'image_de_profil_default');
    }

    $aUser = new User();
    $aUser->update_user_photo($url, $_SESSION["userID"]);

    header("Location: ../myProfile.php");
  die();
?>