<?php

$msg='';
if (isset($_GET['msg'])) {
	$msg = $_GET['msg'];
}
$state='';

if (isset($this->session->userdata['logged_in'])) {

	$uuid=($this->session->userdata['logged_in']['uuid']);
	$firstname = ($this->session->userdata['logged_in']['firstname']);

}
else{

	header("location: sign_in");
}

$bankname='';
$accountname='';
$accountnumber='';

$bankAccount=getBankAccount($uuid);

if($bankAccount!=null){
	$bankname=$bankAccount['bankname'];
	$accountname=$bankAccount['accountname'];
	$accountnumber=$bankAccount['accountnumber'];
}
?>

<div class="main-content2">
	<section class="section">

		<div class="section-body">
			<h2 class="section-title">Hi, <?php echo $firstname ?></h2>
			<p class="section-lead">
				Bank Account Information
			</p>

			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<form method="post" action="<?php echo site_url('merchant/updateaccount');?>" class="needs-validation" novalidate="">
							<div class="card-header">
								<h4>Edit Bank Account</h4>
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
										<label>Bank</label>
										<select class="form-control selectric" name="bankname" id="bankname" required>
											<option selected value='' disabled>Bank</option>

											<option value="Access Bank">Access Bank</option>
											<option value="Citibank">Citibank</option>
											<option value="Diamond Bank">Diamond Bank</option>
											<option value="Ecobank">Ecobank</option>
											<option value="Fidelity Bank">Fidelity Bank</option>
											<option value="First Bank">First Bank</option>
											<option value="First City Monument Bank">First City Monument Bank (FCMB)</option>
											<option value="Guaranty Trust Bank">Guaranty Trust Bank (GTB)</option>
											<option value="Heritage Bank">Heritage Bank</option>
											<option value="Keystone Bank">Keystone Bank</option>
											<option value="Polaris Bank">Polaris Bank</option>
											<option value="Providus Bank">Providus Bank</option>
											<option value="Stanbic IBTC Bank">Stanbic IBTC Bank</option>
											<option value="Standard Chartered Bank">Standard Chartered Bank</option>
											<option value="Sterling Bank">Sterling Bank</option>
											<option value="Suntrust Bank">Suntrust Bank</option>
											<option value="Union Bank">Union Bank</option>
											<option value="United Bank for Africa">United Bank for Africa (UBA)</option>
											<option value="Unity Bank">Unity Bank</option>
											<option value="Wema Bank">Wema Bank</option>
											<option value="Zenith Bank">Zenith Bank</option>
										</select>

									</div>

								</div>

								<div class="row">

									<div class="form-group col-md-6 col-12">
										<label>Account Name</label>
										<input type="text" class="form-control" name="accountname" value="<?php echo $accountname ?>" required>
										<div class="invalid-feedback">
											Please fill in Account Name
										</div>
									</div>


								</div>

								<div class="row">
									<div class="form-group col-md-6 col-12">
										<label>Account Number</label>
										<input type="number" maxlength="10" class="form-control" name="accountnumber" value="<?php echo $accountnumber ?>" required>
										<div class="invalid-feedback">
											Please fill in Account Number
										</div>
									</div>

								</div>

							<input name="uuid" value="<?php echo $uuid ?>" type="hidden">
							</div>
							<div class="card-footer ">
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
	var sel = document.getElementById('bankname');
	var val = '<?php echo $bankname ?>';
	for(var i = 0, j = sel.options.length; i < j; ++i) {

		var a=((sel.options[i].innerHTML).toString()).toLowerCase().trim();
		var b=(val.toString()).toLowerCase().trim();

		if(a===b) {
			sel.selectedIndex = i;
			break;
		}
	}
</script>
