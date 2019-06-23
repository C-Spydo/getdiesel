<?php

$msg='';

if (isset($_GET['msg'])) {
	$msg = $_GET['msg'];
}

if (isset($this->session->userdata['logged_in'])) {

	//print_r($this->session->userdata['logged_in']);
	$firstname = ($this->session->userdata['logged_in']['firstname']);

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
<!--				Change information about your business on this page.-->
			</p>

			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<form method="post" action="<?php echo site_url('admin/set_price');?>" class="needs-validation" novalidate="">
							<div class="card-header">
								<h4>Set Price</h4>
								<font color="red">
									<?php echo "<div class='error_msg'>";
									echo $msg;
									echo "</div>";

									?>
								</font>
							</div>
							<div class="card-body">
								<?php echo "<div class='error_msg'>";
								if (isset($message_display)) {
									echo $message_display;
								}
								echo "</div>";

								?>
								<div class="row">
									<div class="form-group col-md-6 col-12">
										<label>Price per Litre (in Naira)</label>
										<input type="number" class="form-control" step=".01" name="amount" value="" required>
										<div class="invalid-feedback">
											Please enter price in Correct format
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer">
								<button type="submit" class="btn btn-primary">Save</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<script>
	function setTwoNumberDecimal(event) {
		this.value = parseFloat(this.value).toFixed(2);
	}
</script>
