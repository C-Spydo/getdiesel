<?php
include 'header.php';

$msg='';
$currentPrice=0.00;
$currentDelivery=0.00;
if (isset($_GET['msg'])) {
	$msg = $_GET['msg'];
}

if (isset($this->session->userdata['current_price'])) {
	$currentPrice = ($this->session->userdata['current_price']);
}

?>
  <!--End mainmenu area--> 
  <!-- END HEADER -->
			<!-- CONTENT -->
			
			<section class="padding ptb-xs-60">
				<div class="romana_chect_out_form_area sp">
					<div class="container">
						<form method="POST" action="<?php echo site_url('control/make_order');?>">
							<div class="romana_check_out_form">
								<div class="row">
									<div class="col-sm-8">
										<font color="red">
											<?php echo "<div class='error_msg'>";
											echo $msg;
											echo "</div>";

											?>
										</font>
										<div class="check_form_left common_input">
											<div class="heading-box pb-30">
												<h2><span>Make</span> Order</h2>
												<span class="b-line l-left"></span>
											</div>

											<div class="row">
												<div class="col-sm-6">
													<input type="text" name="name" placeholder="Name" required>
												</div>
												<div class="col-sm-6">
													<input type="number"id="quantity"  onchange="litreChange()"
														   name="litres" placeholder="Number of Litres" required>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-12">
													<input type="text" name="company_name" required placeholder="Company(optional)">
												</div>
											</div>
											<div class="row">
												<div class="col-sm-6">
<!--													<label>State</label>-->
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
												<div class="col-sm-6">
													<input type="text" name="address" placeholder="Address" required>
												</div>
											</div>

											<div class="row">
												<div class="col-sm-6">
													<input type="text" name="email" placeholder="Email" required>
												</div>
												<div class="col-sm-6">
													<input type="text" name="phone" placeholder="Phone" required>
												</div>
											</div>

										</div>
									</div>
									<div class="col-sm-4">
										<div class="check_form_right bg-color light-color">

											<div class="heading-box pb-15 ">
												<h2><span>your</span> order</h2>
												<span class="b-line l-left secondary_bg"></span>

											</div>

											<div class="product_order">
												<ul>
													<li>
														Litres<span><h4 id="litre">0 litre</h4></span>
													</li>
													<li>
														Amount (N)<span><h4 id="amount">N0.00</h4></span>
													</li>
													<li>
														Delivery charge:<span id="delivery"><?php echo "N ".$currentDelivery ?></span>
													</li>
													<li>
														Total:<span id="total"><h4>N0.00</h4></span>
													</li>
												</ul>
											</div>
											<div class="romana_select_method ">
												
												<button type="submit" class="btn-text white-btn">place order</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
						<!-- column End -->
					</div>
					<!-- container End -->
				</div>
			</section>

			<!--End Contact-->

<script>
	function litreChange()
	{
		let qnt = document.getElementById('quantity').value;
		let ltrs = document.getElementById('litre');
		let amt = document.getElementById('amount');
		let tot = document.getElementById('total');
		let del = document.getElementById('delivery').value;

		var price=parseFloat('<?php echo $currentPrice ?>').toFixed(2);
		ltrs.innerText = qnt+' litres';
		amt.innerText = 'N '+(qnt * price).toFixed(2).toString();
		tot.innerText= 'N '+((qnt*price)+parseFloat('<?php echo $currentDelivery ?>')).toFixed(2).toString();
	}
</script>		<!-- FOOTER -->

<?php
include 'footer.php';
?>
