<div class="container" style="margin-top:30px">
  <h1>My Profile</h1>
    <div class="row">
        <div class="col-sm-4">
          <div class="container align-middle border mb-sm-5">
            <h3>Update Infos</h3>
            <form method = "post" action = "./DOMAINLOGIC/updateinfo.dom.php">

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="email"><br>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="username">username:</label>
                    <input type="text" class="form-control" name="username" id="username"><br>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>

                <button class="btn btn-success mb-sm-3" type="submit">Update profile</button>
            </form>
          </div>
          <div class="container align-middle border mb-sm-5">
            <h3>Change Password</h3>
            <form method = "post" action = "./DOMAINLOGIC/updatepw.dom.php">

              <div class="form-group">
                      <label for="pwd">password:</label>
                      <input type="password" class="form-control" name="oldpw" id="oldpw" required><br>
                      <div class="valid-feedback">Valid.</div>
                      <div class="invalid-feedback">Please fill out this field.</div>
              </div>

              <div class="form-group">
                  <label for="pwd">new password:</label>
                  <input type="password" class="form-control" name="newpw" id="newpw" required><br>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
              </div>

              <div class="form-group">
                  <label for="pwd">new password validation:</label>
                  <input type="password" class="form-control" name="pwValidation" id="pwValidation" required><br>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
              </div>

              <button class="btn btn-success mb-sm-3" type="submit">Change Password</button>
            </form>
          </div>
        </div>
    <div class="align-right col-sm-4 mb-4">
            <h2> Ma photo de profile</h2>
            <?php
              include "./CLASSES/USER/user.php";
              $aUser = new User();
              $url = $aUser->get_url_by_id($_SESSION["userID"]);
              echo "<img src='$url' alt='Image' height='320' width='320'>";
            ?>
          <form method = "post" action = "./DOMAINLOGIC/changePhoto.dom.php" enctype="multipart/form-data">                
              <div class="form-group">
                  <br>
                  <label for="Media"><h4>Modify photo</h4></label>
                  <input type="file" class="form-control" name="Media" id="Media" >
                  <div class="valid-feedback">Valid.</div>                 
              </div>
              <button class="btn btn-success mb-sm-3" type="submit">Change photo</button>
          </form>
    </div>
  
</div>
