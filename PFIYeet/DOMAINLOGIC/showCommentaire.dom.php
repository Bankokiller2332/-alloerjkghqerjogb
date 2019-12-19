<?php 
      

      $comment = new comment();
      $res = $comment->get_list_comment_by_idTarget_type($id, $typeObjet );
      foreach($res as $commentaire){
          $commentaire->display();
      }
?>