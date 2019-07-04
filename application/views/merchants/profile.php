<?php

$msg='';
if (isset($_GET['msg'])) {
	$msg = $_GET['msg'];
}
$state='';

if (isset($this->session->userdata['logged_in'])) {

	//print_r($this->session->userdata['logged_in']);
	$firstname = ($this->session->userdata['logged_in']['firstname']);
	$email = ($this->session->userdata['logged_in']['business_email']);
	$lastname = ($this->session->userdata['logged_in']['lastname']);
	$business_name = ($this->session->userdata['logged_in']['business_name']);
	$phone = ($this->session->userdata['logged_in']['business_phone']);
	$address = ($this->session->userdata['logged_in']['business_address']);

	$state = ($this->session->userdata['logged_in']['state']);

	$uuid=($this->session->userdata['logged_in']['uuid']);

}
else{

	header("location: sign_in");
}
?>

<div class="main-content2">
	<section class="section">

		<div class="section-body">
			<h2 class="section-title">Hi, <?php echo $firstname ?></h2>
			<p class="section-lead">
				Change information about your business on this page.
			</p>

			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<form method="post" action="<?php echo site_url('merchant/updateprofile');?>" class="needs-validation" novalidate="">
							<div class="card-header">
								<h4>Edit Profile</h4>
							</div>
							<div class="card-body">
								<font color="red">
									<?php echo "<div class='error_msg'>";
									echo $msg;
									echo "</div>";

									?>
								</font>
								<div class="row">
									<div class="form-group col-md-6 col-12">
										<label>First Name</label>
										<input type="text" class="form-control" name="firstname" value="<?php echo $firstname ?>" required>
										<div class="invalid-feedback">
											Please fill in the first name
										</div>
									</div>
									<div class="form-group col-md-6 col-12">
										<label>Last Name</label>
										<input type="text" class="form-control" name="lastname" value="<?php echo $lastname ?>" required>
										<div class="invalid-feedback">
											Please fill in the last name
										</div>
									</div>


								</div>

								<div class="row">
									<div class="form-group col-md-6 col-12">
										<label>Business Name</label>
										<input type="text" class="form-control" name="businessname" value="<?php echo $business_name ?>" required>
										<div class="invalid-feedback">
											Please fill in the business name
										</div>
									</div>
									<div class="form-group col-md-6 col-12">
										<label>Business Address</label>
										<input type="text" class="form-control" name="businessaddress" value="<?php echo $address ?>" required>
										<div class="invalid-feedback">
											Please fill in business address
										</div>
									</div>


								</div>

								<div class="row">
									<div class="form-group col-md-6 col-12">
										<label>State</label>
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

									</div>
									<div class="form-group col-md-6 col-12">
										<label>Address</label>
										<input type="text" class="form-control" name="address" value="<?php echo $address ?>" required>
										<div class="invalid-feedback">
											Please fill in business address
										</div>
									</div>


								</div>

								<div class="row">
									<div class="form-group col-md-7 col-12">
										<label>Email</label>
										<input type="email" class="form-control" name="businessemail" value="<?php echo $email ?>" required>
										<div class="invalid-feedback">
											Please fill in the email
										</div>
									</div>
									<div class="form-group col-md-5 col-12">
										<label>Phone</label>
										<input type="tel" class="form-control" required name="businessphone" value="<?php echo $phone ?>">
									</div>
								</div>
							</div>
							<div class="card-footer text-right">
								<button type="submit" class="btn btn-primary">Save Changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<script>
	var sel = document.getElementById('state');
	var val = '<?php echo $state ?>';
	for(var i = 0, j = sel.options.length; i < j; ++i) {

		var a=((sel.options[i].innerHTML).toString()).toLowerCase().trim();
		var b=(val.toString()).toLowerCase().trim();

		if(a===b) {
			sel.selectedIndex = i;
			break;
		}
	}
</script>
