<?php
include 'header.php';

$msg='';
if (isset($_GET['msg'])) {
	$msg = $_GET['msg'];
}
?>
   <!-- Login Section -->
  <div id="login" class="ptb ptb-xs-60 page-signin">
    <div class="container">
      <div class="row">
        <div class="main-body">
          <div class="body-inner">
            <div class="card bg-white">
              <div class="card-content">
                <section class="logo text-center">
                  <h2>Login</h2>

                </section>
				  <font color="red">
					  <?php echo "<div class='error_msg'>";
					  echo $msg;
					  echo "</div>";

					  ?>
				  </font>
                <form class="form-horizontal ng-pristine ng-valid" method="post"  action="<?php echo site_url('client/sign_in');?>">
                  <fieldset>
                    <div class="form-group">
                      <div class="ui-input-group">
                        <input type="email" name="email" required class="form-control">
                        <span class="input-bar"></span>
                        <label>Email</label>
                      </div>
                    </div>                   
                    <div class="form-group">
                      <div class="ui-input-group">
                        <input type="password"  name="password" required class="form-control">
                        <span class="input-bar"></span>
                        <label>Password </label>
                        <a href="forgotpassword">Forgot your password?</a>
                      </div>
                    </div>
                    </fieldset>

					<div class="romana_select_method ">
						<button type="submit" class="btn-text white-btn">Login</button>
					</div>
                </form>
              </div>
              <div class="card-action no-border text-right">
				  <a href="forgotpassword" class="color-primary">Forgot Password?</a>
				  <a href="register" class="color-primary">New? Create Account</a> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

      <!--End Contact-->
      <!-- FOOTER -->
<?php
	include 'footer.php';
?>
