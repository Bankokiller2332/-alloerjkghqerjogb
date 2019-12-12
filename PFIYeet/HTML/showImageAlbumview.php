<div class="container mt-30">
    <div class="row">
        <div class="col-sm-8 mb-4">
            <?php
              include "./DOMAINLOGIC/showImage.dom.php"
            ?>
        </div>
        <div class="col-sm-4 mb-4">
            <form method = "post" action = "./DOMAINLOGIC/CreatePhoto.dom.php" enctype="multipart/form-data">
                <div class="form-group">
                        <label for="Media">Ajouter Photo:</label>
                        <input type="file" class="form-control" name="Media" id="media"><br>
                        <div class="valid-feedback">Valid.</div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control" name="description" id="description"><br>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="albumID" value="<?php echo $_GET['albumID']?>"><br>
                    </div>
                <button class="btn btn-success mb-sm-3" type="submit">ADD Photo</button>
            </form>
        </div>
    </div>
</div>