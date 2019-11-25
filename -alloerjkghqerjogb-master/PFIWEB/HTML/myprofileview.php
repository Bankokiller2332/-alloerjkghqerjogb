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
</div>
