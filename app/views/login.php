<div class="modal fade" id="login" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center form-title">Login</h4>
      </div>
      <div class="modal-body padtrbl">
        <div class="login-box-body">
          <p class="login-box-msg">Sign in to start your session</p>
          <div class="form-group">
            <form id="login_form" method="POST" action="app/controllers/login.php" data-toggle="validator" role="form">
              <?php if(isset($_GET['exists']) && $_GET["exists"] == "true"):?>
                  There is no such user!
              <?php endif?>
              <div class="form-group has-feedback">
                <!-- email -->
                <input type="email" class="form-control" name="email" id="loginEmail" placeholder="Your Email" required data-rule="email" data-msg="Please enter a valid email" />
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group has-feedback">
                <!-- password -->
                <input class="form-control" placeholder="Password" id="loginPsw" name="password" type="password" required autocomplete="off" />
                <div class="help-block with-errors"></div>
              </div>
              <div class="row">
                <div class="col-xs-12">
                  <div class="checkbox icheck">
                    <label>
                      <input type="checkbox" id="loginrem"> Remember Me
                    </label>
                  </div>
                </div>
                <div class="col-xs-12">
                  <input id="login-button" type="submit" class="btn btn-green btn-block btn-flat" value="Sign in" />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>