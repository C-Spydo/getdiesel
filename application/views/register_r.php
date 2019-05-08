<?php
if (isset($this->session->userdata['logged_in'])) {
	$user_id = ($this->session->userdata['logged_in']['user_id']);
}
else{
	$user_id='unknown';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>GetDiesel - Merchant Registration</title>

	<!-- CSS -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/form-elements.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- Favicon and touch icons -->
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/ico/favicon.png">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>assets/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url(); ?>assets/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>assets/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>assets/ico/apple-touch-icon-57-precomposed.png">

</head>

<body background="<?php echo base_url(); ?>assets/img/backgrounds/1.jpg">

<div class="top-content">
  <?php echo form_open('Teacher/Register'); ?>

  <?php
echo "<div class='error_msg'>";
if (isset($error_message)) {
echo $error_message;
}
echo validation_errors();
echo "</div>";

?>
	<div class="inner-bg">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2 text">
					<h1><strong>GetDiesel</strong> - Merchant Registration</h1>
					<div class="description">
						<p>
							Kindly Ensure you fill in your information accurately
<!--							Download it on <a href="http://azmind.com"><strong>AZMIND</strong></a>, customize and use it as you like!-->
						</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3 form-box">

					<form role="form" action="" method="post" class="registration-form">

						<fieldset>
							<div class="form-top">
								<div class="form-top-left">
									<h3>Step 1 / 3</h3>
									<p>Tell us who you are:</p>
								</div>
								<div class="form-top-right">
									<i class="fa fa-user"></i>
								</div>
							</div>
							<div class="form-bottom">
								<div class="form-group">
									<label class="sr-only" for="form-first-name">First name</label>
									<input type="text" name="firstname" placeholder="First name..." class="form-first-name form-control" id="form-first-name">
								</div>
								<div class="form-group">
									<label class="sr-only" for="form-last-name">Last name</label>
									<input type="text" name="lastname" placeholder="Last name..." class="form-last-name form-control" id="form-last-name">
								</div>
<!--								<div class="form-group">-->
<!--									<label class="sr-only" for="form-about-yourself">About yourself</label>-->
<!--									<textarea name="form-about-yourself" placeholder="About yourself..."-->
<!--											  class="form-about-yourself form-control" id="form-about-yourself"></textarea>-->
<!--								</div>-->
								<button type="button" class="btn btn-next">Next</button>
							</div>
						</fieldset>

						<fieldset>
							<div class="form-top">
								<div class="form-top-left">
									<h3>Step 2 / 3</h3>
									<p>About your Business</p>
								</div>
								<div class="form-top-right">
									<i class="fa fa-key"></i>
								</div>
							</div>
							<div class="form-bottom">
								<div class="form-group">
									<label class="sr-only" for="form-email">Business Name</label>
									<input type="text" name="businessname" placeholder="Business Name" class="form-email form-control" id="form-email">
								</div>

								<div class="form-group">
									<label class="sr-only" for="form-email">Address</label>
									<input type="text" name="businessaddress" placeholder="Business Address" class="form-email form-control" id="form-email">
								</div>

								<div class="form-group">
									<select name="state" required id="state">
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
								<div class="form-group">
									<select  required name="lga" class="browser-default" id="localg">
										<option value=''>Select Your Local Government Area</option>
									</select>
								</div>

								<div class="form-group">
									<label class="sr-only" for="form-email">Email</label>
									<input type="text" name="businessemail" placeholder="Business Email" class="form-email form-control" id="form-email">
								</div>

								<div class="form-group">
									<label class="sr-only" for="form-email">Phone Number</label>
									<input type="text" name="businessphone" placeholder="Business Phone Number" class="form-email form-control" id="form-email">
								</div>

								<button type="button" class="btn btn-previous">Previous</button>
								<button type="button" class="btn btn-next">Next</button>
							</div>
						</fieldset>

						<fieldset>
							<div class="form-top">
								<div class="form-top-left">
									<h3>Step 3 / 3</h3>
									<p>Set Passwords:</p>
								</div>
								<div class="form-top-right">
									<i class="fa fa-twitter"></i>
								</div>
							</div>
							<div class="form-bottom">
								<div class="form-group">
									<label class="sr-only" for="form-password">Password</label>
									<input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
								</div>
								<div class="form-group">
									<label class="sr-only" for="form-repeat-password">Repeat password</label>
									<input type="password" name="repassword" placeholder="Repeat password..."
										   class="form-repeat-password form-control" id="form-repeat-password">
								</div>
								<button type="button" class="btn btn-previous">Previous</button>
								<button type="submit" class="btn">Sign me up!</button>
							</div>
						</fieldset>

					</form>

				</div>
			</div>
		</div>
	</div>

</div>


<!-- Javascript -->
<script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.backstretch.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/retina-1.1.0.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
<script src="<?php echo base_url(); ?>assets/js/placeholder.js"></script>
<script src="<?php echo base_url() ?>js/state.js"></script>
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
</body>

</html>

