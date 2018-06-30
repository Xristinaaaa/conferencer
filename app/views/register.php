<div class="modal fade" id="register" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center form-title">Register</h4>
        </div>
        <div class="modal-body padtrbl">
          <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <div class="form-group">
              <form id="registerForm" method="POST" action="app/controllers/register.php">
                <?php if(isset($_GET['exists']) && $_GET["exists"] == "true"):?>
                    There is already such email!
                <?php endif?>
                <div class="form-group has-feedback">
                  <!-- username -->
                  <input class="form-control" placeholder="Username" id="registerUsername" name="name" type="text" 
                    autocomplete="off" required/>
                  <div class="help-block with-errors"></div>
                </div>
                <div class="form-group has-feedback">
                  <!-- email -->
                  <input class="form-control" placeholder="Email" id="registerEmail" name="email" type="text" 
                    autocomplete="off" required data-rule="email" data-msg="Please enter a valid email" />
                  <div class="help-block with-errors"></div>
                </div>
                <div class="form-group has-feedback">
                  <!-- password -->
                  <input class="form-control" data-minlength="6" placeholder="Password" id="registerPsw" name="password" type="password" 
                  autocomplete="off" required/>
                  <div class="help-block with-errors"></div>
                </div>
                <div class="form-group has-feedback">
                  <!-- confirm password -->
                  <input class="form-control" placeholder="Confirm Password" id="confirmPsw" data-match="#registerPsw" 
                    data-match-error="Whoops, these don't match" type="password" autocomplete="off" required/>
                  <div class="help-block with-errors"></div>
                </div>
                <div class="row">
                  <div class="col-xs-12">
                    <input type="reset" class="btn btn-green btn-block"  value="Clear" />
                    <input id="register-button" type="submit" class="btn btn-green btn-block btn-flat"  value="Register" />
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>