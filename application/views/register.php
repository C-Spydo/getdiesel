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
                  <h2>Create Account</h2>

                </section>
				  <font color="red">
					  <?php echo "<div class='error_msg'>";
					  echo $msg;
					  echo "</div>";

					  ?>
				  </font>
                <form class="form-horizontal ng-pristine ng-valid"
					  method="post"  action="<?php echo site_url('client/sign_up');?>">
                  <fieldset>
                    <div class="form-group">
                      <div class="ui-input-group">
                        <input type="text" name="firstname" required class="form-control">
                        <span class="input-bar"></span>
                        <label>First Name</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="ui-input-group">
                        <input type="text" name="lastname" required class="form-control">
                        <span class="input-bar"></span>
                        <label>Last Name</label>
                      </div>
                    </div>


					  <div class="form-group">
						  <div class="ui-input-group">
							  <input type="text" name="email" required  class="form-control">
							  <span class="input-bar"></span>
							  <label>Your Email</label>
						  </div>
					  </div>

					  <div class="form-group">
						  <div class="ui-input-group">

							  <select class="form-control selectric" name="state" id="state" required>
								  <option selected value='' disabled>State</option>

								  <option value='Abia' >Abia</option>
								  <option value='Adamawa'>Adamawa</option>
								  <option value='AkwaIbom' >AkwaIbom</option>
								  <option value='Anambra' >Anambra</option>
								  <option value='Bauchi' >Bauchi</option>
								  <option value='Bayelsa' >Bayelsa</option>
								  <option value='Benue' >Benue</option>
								  <option value='Borno' >Borno</option>
								  <option value='CrossRiver' >CrossRiver</option>
								  <option value='Delta' >Delta</option>
								  <option value='Ebonyi' >Ebonyi</option>
								  <option value='Edo' > Edo</option>
								  <option value='Ekiti' > Ekiti</option>
								  <option value='Enugu' > Enugu</option>
								  <option value='FCT' > FCT</option>
								  <option value='Gombe' > Gombe</option>
								  <option value='Imo' > Imo</option>
								  <option value='Jigawa' > Jigawa</option>
								  <option value='Kaduna' > Kaduna</option>
								  <option value='Kano' > Kano</option>
								  <option value='Katsina' > Katsina</option>
								  <option value='Kebbi' > Kebbi</option>
								  <option value='Kogi' > Kogi</option>
								  <option value='Kwara' > Kwara</option>
								  <option value='Lagos' > Lagos</option>
								  <option value='Nassarawa' > Nassarawa</option>
								  <option value='Niger' > Niger</option>
								  <option value='Ogun' > Ogun</option>
								  <option value='Ondo' > Ondo</option>
								  <option value='Osun' > Osun</option>
								  <option value='Oyo' > Oyo</option>
								  <option value='Plateau' > Plateau</option>
								  <option value='Rivers' > Rivers</option>
								  <option value='Sokoto' > Sokoto</option>
								  <option value='Taraba' > Taraba</option>
								  <option value='Yobe' > Yobe</option>
								  <option value='Zamfara' > Zamfara</option>
							  </select>
<!--							  <label>State</label>-->
						  </div>
					  </div>

					  <div class="form-group">
						  <div class="ui-input-group">
							  <input type="text" name="address" required class="form-control">
							  <span class="input-bar"></span>
							  <label>Address</label>
						  </div>
					  </div>

                    <div class="form-group">
                      <div class="ui-input-group">
                        <input type="text" name="phone" required class="form-control">
                        <span class="input-bar"></span>
                        <label>Your Phone Number</label>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="ui-input-group">
                        <input type="password"  name="password" required class="form-control">
                        <span class="input-bar"></span>
                        <label>Your password </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="ui-input-group">
                        <input type="password" required  name="password-confirm" class="form-control">
                        <span class="input-bar"></span>
                        <label>Please confirm your password </label>
                      </div>
                    </div>
                    <div class="spacer"></div>
                    <div class="form-group checkbox-field">
                      <label for="check_box" class="text-small">
                        <input type="checkbox" required id="check_box" >
                        <span class="ion-ios-checkmark-empty22 custom-check"></span> By clicking on sign up, you agree to
						  <a href="javascript:;"><i>terms</i></a> and <a href="javascript:;"><i>privacy policy</i></a></label>
                    </div>
                  </fieldset>

					<div class="romana_select_method ">
						<button type="submit" class="btn-text white-btn">Sign Up</button>
					</div>

                </form>
              </div>
<!--              <div class="card-action no-border text-right"><a href="" class="color-primary">Sign Up</a> </div>-->
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
