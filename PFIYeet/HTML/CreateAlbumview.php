<div class="align-right ">
        <h2> Creation d'album</h2>
        <form method = "post" action = "./DOMAINLOGIC/createAlbum.dom.php">                
            <div class="form-group">
                    <label for="titre">Titre:</label>
                    <input type="text" class="form-control" name="titre" id="titre"><br>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" class="form-control" name="description" id="description"><br>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
            <button class="btn btn-success mb-sm-3" type="submit">Create Album</button>
        </form>
</div>