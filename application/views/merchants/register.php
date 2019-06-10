<?php
//if (isset($this->session->userdata['logged_in'])) {
//	$user_id = ($this->session->userdata['logged_in']['uuid']);
//}
//else{
//	$user_id='unknown';
//}
//
////$this->session->userdata['logged_in']['username']
//?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Register &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>node_modules/selectric/public/selectric.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/components.css">

	<script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>
</head>

<body>
<?php echo form_open('Merchant/Register'); ?>

<?php
echo "<div class='error_msg'>";
if (isset($error_message)) {
	echo $error_message;
}
echo validation_errors();
echo "</div>";

?>

  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>

              <div class="card-body">
				  <?php echo "<div class='error_msg'>";
				  if (isset($message_display)) {
					  echo $message_display;
				  }
				  echo "</div>";

				  ?>

                <form method="POST" action="../../index.html">
					<div class="form-divider">
						Tell us about yourself
					</div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="frist_name">First Name</label>
                      <input id="frist_name" type="text" class="form-control" name="firstname" required autofocus>
                    </div>
                    <div class="form-group col-6">
                      <label for="last_name">Last Name</label>
                      <input id="last_name" type="text" class="form-control" name="lastname" required>
                    </div>
                  </div>


                  <div class="form-divider">
                    Tell us about your business
                  </div>
					<div class="row">
						<div class="form-group col-12">
							<label for="frist_name">Business Name</label>
							<input id="frist_name" type="text" class="form-control" name="businessname" required autofocus>
						</div>
					</div>

					<div class="row">
						<div class="form-group col-12">
							<label for="frist_name">Business Address</label>
							<input id="frist_name" type="text" class="form-control" name="businessaddress" required autofocus>
						</div>
					</div>

                  <div class="row">
					  <div class="form-group col-6">
						  <label>State</label>
						  <select class="form-control selectric" name="state" id="state">
							  <option selected value='' disabled>Business State</option>

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
					  </div>
					  <div class="form-group col-6">
						  <label>Local Government Area</label>
						  <select class="form-control selectric" id="localg" name="lga" required>
							  <option selected value='' disabled>Local Government Area</option>
						  </select>
					  </div>
				  </div>

					<div class="row">
					<div class="form-group col-6">
						  <label for="email">Business Email</label>
						  <input id="email" type="email" class="form-control" name="businessemail" required>
						  <div class="invalid-feedback">
						  </div>
					  </div>

						<div class="form-group col-6">
							<label>Business Phone Number</label>
							<input type="text" name="businessphone" required class="form-control">
						</div>

                  </div>
					<div class="form-divider">
						Enter Passwords
					</div>
					<div class="row">
						<div class="form-group col-6">
							<label for="password" class="d-block">Password</label>
							<input id="password" type="password" class="form-control pwstrength"
								   required data-indicator="pwindicator" name="password">
							<div id="pwindicator" class="pwindicator">
								<div class="bar"></div>
								<div class="label"></div>
							</div>
						</div>
						<div class="form-group col-6">
							<label for="password2" class="d-block">Password Confirmation</label>
							<input id="password2" type="password" class="form-control"
								   name="password-confirm" required>
						</div>
					</div>


                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" required name="agree" class="custom-control-input" id="agree">
                      <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>

					<div class="form-group text-right">
						<a href="forgotpassword" class="float-left mt-3">
							Forgot Password?
						</a>
						<a href="login">
							Already have an account?
						<button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
							Sign In
						</button>
						</a>
					</div>


                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; GetDiesel 2019
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<script src="<?php echo base_url() ?>assets/js/state.js"></script>
<!--[if lt IE 10]>

<![endif]-->
<script>

	$(function(){


		var items = [];

		$.each(state['Abia'],function(i,val){

			items.push( "<option value = '" + val + "'>"+ val +"</option>");
		});

		$('#localg').append(items);


		$(document).on("change",'#state',function(){

			var st_p = $(this).val();

			$('#localg').html("");
			var items = [];

			$.each(state[st_p],function(i,val){

				items.push( "<option value = '" + val + "'>"+ val +"</option>");

			});

			$('#localg').append(items);
		});


	});


</script>
  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="<?php echo base_url(); ?>node_modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="<?php echo base_url(); ?>node_modules/selectric/public/jquery.selectric.min.js"></script>


  <!-- Template JS File -->
  <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>assets/js/page/auth-register.js"></script>
</body>
</html>
