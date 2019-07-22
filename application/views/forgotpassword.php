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
								<h2>Forgot Password</h2>

							</section>
							<font color="red">
								<?php echo "<div class='error_msg'>";
								echo $msg;
								echo "</div>";

								?>
							</font>
							<form class="form-horizontal ng-pristine ng-valid" method="post"  action="<?php echo site_url('client/forgot_pass');?>">
								<fieldset>
									<div class="form-group">
										<div class="ui-input-group">
											<input type="email" name="email"
										     placeholder="Enter your registered Email"
												   required class="form-control">
											<span class="input-bar"></span>
<!--											<label>Email</label>-->
										</div>
									</div>
								</fieldset>

								<div class="romana_select_method ">
									<button type="submit" class="btn-text white-btn">Reset</button>
								</div>
							</form>
						</div>
						<div class="card-action no-border text-right">
							<a href="login" class="color-primary">Login</a>
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
