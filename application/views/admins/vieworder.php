<?php
$msg='';
$order_id=$_GET['order_id'];

if (isset($_GET['msg'])) {
	$msg = $_GET['msg'];
}

$row=getOrderWithId($order_id);


?>

<div class="main-content2">
	<section class="section">

		<div class="section-body">
			<h2 class="section-title">Order ID: <?php echo $order_id ?></h2>
			<p class="section-lead">
<!--				Change information about your business on this page.-->
			</p>

			<div class="row">
				<div class="col-lg-12">
					<div class="card">

							<div class="card-header">
								<h4>Order Details</h4>
								<font color="red">
								<?php echo "<div class='error_msg'>";
								echo $msg;
								echo "</div>";

								?>
								</font>
							</div>
							<div class="card-body">

								<form method="post" action="<?php echo site_url('admin/assign_merchant');?>">
								<div class="row">
									<div class="form-group col-md-6 col-12">
										<label><strong> Client Details</strong></label>
										<br>
										<label><?php echo
												$row['name']."<br>".$row['email']."<br>".$row['phone'];
											?></label>
									</div>
									<div class="form-group col-md-6 col-12">
										<label><strong>Order Details</strong></label>
										<br>
										<label><?php echo
												$row['quantity']." ltrs".
												"<br>".$row['amount']." Naira";
											?></label>
									</div>


								</div>

								<div class="row">
									<?php
									if($row['merchant']!=''){
										$mchant=getMerchantWithId($row['merchant']);
									?>
									<div class="form-group col-md-6 col-12">
										<label><strong>Merchant Details</strong></label>
										<br>
										<label><?php echo
												$mchant['business_name'].
												"<br>".$mchant['business_address'].",".$mchant['state']
											."<br>".$mchant['business_email']." , ".$mchant['business_phone'];
											?></label>
									</div>
								<?php } else {
								?>

									<div class="form-group col-6">
										<label>Assign Merchant</label>
										<select class="form-control selectric" name="merchant" id="state" required>
											<option selected value='' disabled>Select Merchant</option>
											<?php
												$mInStates=getMerchantsInState($row['state']);
												foreach($mInStates as $m){

											?>
											<option value='<?php echo $m['uuid']; ?>' >
												<?php echo $m['business_name']; ?></option>
											<?php } ?>
										</select>
										<input type="hidden" name="uuid" value="<?php echo $order_id; ?>">
										<div class="form-group">
											<button type="submit"  onclick=<?php echo 'Hello';?>"
													class="btn btn-primary btn-lg btn-block">
												Update
											</button>
										</div>

									</div>



								<?php } ?>

									<div class="form-group col-md-6 col-12">
										<label><strong>Order Status</strong></label>
										<br>
										<label><?php echo statusToText($row['status']); ?></label>
									</div>

								</div>
								</form>

							</div>
							<div class="card-footer text-right">
								<!--								<button type="submit" class="btn btn-primary">Save Changes</button>-->
							</div>

					</div>

				</div>
			</div>
		</div>
	</section>
</div>
