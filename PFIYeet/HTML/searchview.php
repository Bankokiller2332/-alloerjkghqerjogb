<?php
    include_once "./CLASSES/ALBUM/album.php";
    include_once "./CLASSES/USER/user.php";
    include_once "./CLASSES/IMAGE/image.php";
    include_once "./CLASSES/COMMENT/comment.php";

    $album_list = Album::search_album_like($_GET["search"]);
    $user_list = User::search_user_like($_GET["search"]);
    $image_list = Image::search_image_like($_GET["search"]);
?>

<h1 class="my-4">Search result :</h1>
<h3 class="my-4">Albums :</h3>
<?php
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
        echo "<div class='card-header text-left '><a href='displayalbum.php?albumID=$id&albumTitle=$title&description=$description'><h5>$title</h5></a>";
        echo "</div>"; 
        if(isset($_SESSION["userID"]))
        {
            if($idDuProprio == $_SESSION["userID"])
            {
                echo "<a href='./DOMAINLOGIC/supprimerAlbum.dom.php?albumID=$id'>Supprimer</a>";
            }
        } 
        include __DIR__."/../DOMAINLOGIC/showCommentaire.dom.php";
        include "./HTML/afficherCommentaireView.php";
        echo "</div>";
        echo "<div class='btn-group-toggle mb-3' data-toggle='buttons'>";
        echo "<label class='btn btn-primary active btn-outline-light'>";
        echo "<input type='checkbox' checked autocomplete='off'> like";
        echo "</label>";
       
        echo "</div>";
    }
    echo "<h3 class='my-4'>Images :</h3>";
    foreach($image_list as $image){
        $image->display();
        $url = $image->get_URL();
        $description = $image->get_description();
        $id = $image->get_id();
        $album = new Album();
        $album->load_album_by_id($image->get_albumID());
        $user = new User();
        $user->load_user_by_name($album->get_proprietaire());
        $idDuProprio = $user->get_id();
        $typeObjet = "image";
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
        include __DIR__."/../DOMAINLOGIC/showCommentaire.dom.php";
        include "./HTML/afficherCommentaireView.php";
        
        echo "</div>";
    }
     
     echo '<h3 class="my-4">Usagers :</h3>';
    foreach($user_list as $user){
        $userName = $user->get_username();   
        $usagerID = $user->get_id();    
        echo "<div class='card bg-dark mb-4'>";
        echo "<div class='card-header text-left '><a href='./otherUserAlbums.php?userName=$userName&usagerID=$usagerID'><h5>$userName</h5></a>";    
        echo "</div>";
        echo "</div>";
    }     
?>
