<div class="card mb-4">
  <div class="card-header bg-dark text-left">
    <h5 class="text-left text-light"><?php echo $user->get_username(), "#",$auteurID ?></h5>
  </div>
  <div class="card-body text-left">
    <p class="card-text"><?php echo $content ?></p>
  </div>

  <?php 

  if(isset($_SESSION["userID"]) && $auteurID == $_SESSION["userID"]){

    echo "<div class='card-footer text-left'>
    <button class='btn btn-secondary mb-2' data-toggle='collapse' data-target='#col$id'>Edit comment</button>
    <div id='col$id' class='collapse'>

    <form method = 'post' action = 'DOMAINLOGIC/editcomment.dom.php'>

      <div class='form-group'>
        <input type='hidden' name='commentID' value='$id'>
        <textarea rows='5' name='content' id='content' placeholder='Got something wrong, punk?' required></textarea>
        <div class='valid-feedback'>Valid.</div>
        <div class='invalid-feedback'>Please fill out this field.</div>
      </div>

      <div class='form-group'>
        <button class='btn btn-success mb-2' type='submit'>Submit</button>
      </div>

    </form>


    <form method = 'post' action = 'DOMAINLOGIC/deletecomment.dom.php'>

      <input type='hidden' name='commentID' value='$id'>
      <button class='btn btn-danger mb-2' type='submit'>Delete comment</button>

    </form>
    </div>
    </div>";

  }
  ?>

</div>