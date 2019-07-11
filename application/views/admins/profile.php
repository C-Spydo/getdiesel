<?php

$msg='';
if (isset($_GET['msg'])) {
	$msg = $_GET['msg'];
}

if (isset($this->session->userdata['logged_in'])) {

	//print_r($this->session->userdata['logged_in']);
	$firstname = ($this->session->userdata['logged_in']['firstname']);
	$email = ($this->session->userdata['logged_in']['email']);
	$lastname = ($this->session->userdata['logged_in']['lastname']);
	$phone = ($this->session->userdata['logged_in']['phone']);

}
else{

	header("location: sign_in");
	//$this->view('merchants/login');
	//redirect('merchant/login');
	//header("location: login");
}
?>

<div class="main-content2">
	<section class="section">

		<div class="section-body">
			<h2 class="section-title">Hi, <?php echo $firstname ?></h2>
			<p class="section-lead">
				Edit your information on this page.
			</p>

			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<form method="post" action="<?php echo site_url('admin/update_profile');?>" class="needs-validation" novalidate="">
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
									<div class="form-group col-md-7 col-12">
										<label>Email</label>
										<input type="email" readonly class="form-control" name="email" value="<?php echo $email ?>" required>
										<div class="invalid-feedback">
											Please fill in the email
										</div>
									</div>
									<div class="form-group col-md-5 col-12">
										<label>Phone</label>
										<input type="tel" class="form-control" required name="phone" value="<?php echo $phone ?>">
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


