<?php
	include 'header.php';
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
                <form class="form-horizontal ng-pristine ng-valid">
                  <fieldset>
                    <div class="form-group">
                      <div class="ui-input-group">
                        <input type="text" required class="form-control">
                        <span class="input-bar"></span>
                        <label>Username or Email</label>
                      </div>
                    </div>                   
                    <div class="form-group">
                      <div class="ui-input-group">
                        <input type="text"  required class="form-control">
                        <span class="input-bar"></span>
                        <label>Password </label>
                        <a href="">Forgot your password?</a>
                      </div>
                    </div>
                    </fieldset>
                </form>
              </div>
              <div class="card-action no-border text-right"> <a href="">Login</a>
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
