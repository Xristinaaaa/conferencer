<!-- <?php if(isset($_GET['exists']) && $_GET['exists']):?>
    Този имейл вече е зает
<?php endif?>
    <div class="input_container c1" id="name">
        <input name="name" type="text" placeholder="Име" required />
    </div>
    <div class="input_container c1">
        <input name="email" type="email" placeholder="Електронна поща" required />
    </div>
    <div class="input_container">
        <input name="password" type="password" placeholder="Парола" required />
    </div>
-->
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
              <form name="" id="registerForm" method="POST" action="../controllers/register.php">
                <div class="form-group has-feedback">
                  <!----- username -------------->
                  <input class="form-control" placeholder="Username" id="loginid" type="text" autocomplete="off" />
                  <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span>
                  <!---Alredy exists  ! -->
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                  <!----- email -------------->
                  <input class="form-control" placeholder="Email" id="loginemail" type="text" autocomplete="off" />
                  <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span>
                  <!---Alredy exists  ! -->
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                  <!----- password -------------->
                  <input class="form-control" placeholder="Password" id="loginpsw" type="password" autocomplete="off" />
                  <span style="display:none;font-weight:bold; position:absolute;color: grey;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginpsw"></span>
                  <!---Alredy exists  ! -->
                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                  <!----- password -------------->
                  <input class="form-control" placeholder="Confirm Password" id="loginpsw" type="password" autocomplete="off" />
                  <span style="display:none;font-weight:bold; position:absolute;color: grey;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginpsw"></span>
                  <!---Alredy exists  ! -->
                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
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
                    <input type="reset" class="btn btn-green btn-block"  value="Clear" />
                    <input type="submit" class="btn btn-green btn-block btn-flat"  value="Register" />
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>