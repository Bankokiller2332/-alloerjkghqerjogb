<?php
    include "./CLASSES/ALBUM/album.php";
    include_once "./CLASSES/USER/user.php";
    include_once "./CLASSES/IMAGE/image.php";
    include_once "./CLASSES/COMMENT/comment.php";
    
    $albumID = $_GET["albumID"];
    $album = new Album(); 
    $album->load_album_by_id($albumID);
    $proprio = $album->get_proprietaire();
    $titreAlbum = $album->get_title();
    $desc = $album->get_description();
    $user = new User();
    $user->load_user_by_name($proprio);
    $typeObjet = "image";

    $idDuProprio = $user->get_id();
    //$album_list = Album::create_album_list($_SESSION["userID"]);
    $image_list = Image::create_image_list($albumID);
?>

<h1 class="my-4"><?php echo "$titreAlbum"; ?></h1>
<h3 class="my-4"><?php echo "$desc"; ?> </h3>
<?php
    foreach($image_list as $image){
        $image->display();
        $url = $image->get_URL();
        $description = $image->get_description();
        $id = $image->get_id();
       
        echo "<div class='card bg-dark mb-4'>";
        echo "<div class='card-header'>";
        echo "<img src='$url' alt='$description' width='400' height='400'>";
        echo "<h3 style='color:white'> $description</h3>";
        echo "</div>";
        if(isset($_SESSION["userID"]))
        {
            if($idDuProprio == $_SESSION["userID"])
            {
                echo "<a href='DOMAINLOGIC/deletePhoto.dom.php?imageID=$id'>Supprimer</a>";
            }

        }
        include "showCommentaire.dom.php";
        include "./HTML/afficherCommentaireView.php";
        
        echo "</div>";

    }
  
?>