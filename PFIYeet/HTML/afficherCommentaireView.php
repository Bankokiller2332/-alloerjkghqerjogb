<button class='btn btn-secondary mb-2' data-toggle='collapse' data-target='<?php echo"#new$id"?>'>Écrire Commentaire</button>
<div id='<?php echo"new$id"?>' class='collapse'>
    <form method = 'post' action = './DOMAINLOGIC/createcomment.dom.php'>
        <div class='form-group'>
            <input type='hidden' name='typeObjet' value ='<?php echo "$typeObjet"?>'>
            <input type='hidden' name='targetID' value='<?php echo"$id"?>'>
            <textarea rows='5' name='content' id='content' placeholder='Please enter your fucking comment' required></textarea>
            <div class='valid-feedback'>Valid.</div>
            <div class='invalid-feedback'>Please fill out this field.</div>
        </div>
        <div class='form-group'>
            <button class='btn btn-success mb-2' type='submit'>Submit</button>
        </div>
    </form>
 </div>