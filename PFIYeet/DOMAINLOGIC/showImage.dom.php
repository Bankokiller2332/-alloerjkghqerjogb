<?php
    include "./CLASSES/ALBUM/album.php";
    include_once "./CLASSES/USER/user.php";
    include_once "./CLASSES/IMAGE/image.php";
    
    $albumID = $_GET["albumID"];
    $album = new Album(); 
    $album->load_album_by_id($albumID);
    $proprio = $album->get_proprietaire();
    $titreAlbum = $album->get_title();
    $desc = $album->get_description();
    $user = new User();
    $user->load_user_by_name($proprio);

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
        echo "<button class='btn btn-secondary mb-2' data-toggle='collapse' data-target='#col$id'>Écrire Commentaire</button>";
        echo" <div id='col$id' class='collapse'> 
        <form method = 'post' action = 'DOMAINLOGIC/createcomment.dom.php'>

      <div class='form-group'>
        <input type='hidden' name='typeObjet' value ='image'>
        <input type='hidden' name='commentID' value='$id'>
        <textarea rows='5' name='content' id='content' placeholder='Please enter your fucking comment' required></textarea>
        <div class='valid-feedback'>Valid.</div>
        <div class='invalid-feedback'>Please fill out this field.</div>
      </div>

      <div class='form-group'>
        <button class='btn btn-success mb-2' type='submit'>Submit</button>
      </div>

    </form>
    </div>
    </div>";
    }
  
?>