<?php
    include "CLASSES/ALBUM/album.php";

    //$album_list = Album::create_album_list($_SESSION["userID"]);
    $album_list = Album::create_album_list_all();
?>

<h3 class="my-4">Billboard</h3>
<?php
    foreach($album_list as $album){
        $album->display_album();
        echo "<div class='btn-group-toggle mb-3' data-toggle='buttons'>";
        echo "<label class='btn btn-primary active btn-outline-light'>";
        echo "<input type='checkbox' checked autocomplete='off'> like";
        echo "</label>";
        echo "</div>";
    }
  
?>
