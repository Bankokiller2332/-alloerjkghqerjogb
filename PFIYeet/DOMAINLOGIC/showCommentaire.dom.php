<?php 
      include "./CLASSES/COMMENT/comment.php";

      $comment = new comment();
      $res = $comment->get_list_comment_by_idTarget($id);
      foreach($res as $commentaire){
          $commentaire->display();
      }
?>