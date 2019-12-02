<?php
    include "CLASSES/ALBUM/album.php";
    $album_list = Album::create_album_list($_SESSION["userID"]);
?>

<h3 class="my-4">Albums</h3>
<?php
  foreach($album_list as $album){
    $album->display_album();
  }
?>
