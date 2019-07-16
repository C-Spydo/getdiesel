<?php

$msg='';
$currentPrice=currentPrice();
$currentDelivery=0.00;
if (isset($_GET['msg'])) {
	$msg = $_GET['msg'];
}



$email='';
$phone='';
$address='';
$state='';
$name='';
$uuid='';
if (isset($this->session->userdata['current_price'])) {
	$currentPrice = ($this->session->userdata['current_price']);
}

if (isset($this->session->userdata['client_in'])) {

	$firstname = ($this->session->userdata['client_in']['firstname']);
	$email = ($this->session->userdata['client_in']['email']);
	$phone = ($this->session->userdata['client_in']['phone']);
	$address = ($this->session->userdata['client_in']['address']);
	$state = ($this->session->userdata['client_in']['state']);
	$lastname = ($this->session->userdata['client_in']['lastname']);
	$name = $firstname." ".$lastname;

	$uuid=($this->session->userdata['client_in']['uuid']);

}



?>
<!--End mainmenu area-->
<!-- END HEADER -->
<!-- CONTENT -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600,700,800%7CLato:300,400,700" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assetsfe/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assetsfe/css/font-awesome.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assetsfe/css/ionicons.css" rel="stylesheet" type="text/css">
<!--Light box-->
<link href="<?php echo base_url(); ?>assetsfe/css/jquery.fancybox.css" rel="stylesheet" type="text/css">
<!-- carousel -->
<!-- PrettyPhoto Popup -->
<link href="<?php echo base_url(); ?>assetsfe/css/prettyPhoto.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assetsfe/css/plugin/owl.carousel.css" rel="stylesheet" type="text/css">
<!--Main Slider-->
<link href="<?php echo base_url(); ?>assetsfe/css/settings.css" type="text/css" rel="stylesheet" media="screen">
<link href="<?php echo base_url(); ?>assetsfe/css/layers.css" type="text/css" rel="stylesheet" media="screen">
<link href="<?php echo base_url(); ?>assetsfe/css/style.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assetsfe/css/bootsnav.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assetsfe/css/footer.css" rel="stylesheet">

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
										<label>Name</label>
										<input type="text" name="name" placeholder="Name" required
											   value="<?php echo $name ?>">
									</div>
									<div class="col-sm-6">
										<label>Quantity</label>
										<input type="number"id="quantity"  onchange="litreChange()"

											   name="litres" placeholder="Number of Litres" required>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<label>Company Name</label>
										<input type="text" name="company_name" placeholder="Company(optional)">
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
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
									<div class="col-sm-6">
										<label>Address</label>
										<input type="text" name="address"
											   value="<?php echo $address ?>"
											   placeholder="Address" required>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-6">
										<label>Email</label>
										<input type="text" name="email" placeholder="Email"
											   value="<?php echo $email ?>"required>
									</div>
									<div class="col-sm-6">
										<label>Phone Number</label>
										<input type="text" name="phone"
											   value="<?php echo $phone ?>" placeholder="Phone" required>
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
								<input type="hidden" name="uuid"
									   value="<?php echo $uuid ?>"required>
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

	var sel = document.getElementById('state');
	var val = '<?php echo $state ?>';
	for(var i = 0, j = sel.options.length; i < j; ++i) {

		var a=((sel.options[i].innerHTML).toString()).toLowerCase().trim();
		var b=(val.toString()).toLowerCase().trim();

		// document.write(a.trim().length.toString()+"<br>");

		if(a===b) {
			sel.selectedIndex = i;
			break;
		}
	}

	// sel.selectedIndex = 16;
</script>		<!-- FOOTER -->


<script src="<?php echo base_url(); ?>assetsfe/js/jquery.min.js" type="text/javascript"></script>
<!-- masonry,isotope Effect Js -->
<script src="<?php echo base_url(); ?>assetsfe/js/imagesloaded.pkgd.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assetsfe/js/isotope.pkgd.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assetsfe/js/masonry.pkgd.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assetsfe/js/jquery.appear.js" type="text/javascript"></script>
<!-- bootstrap Js -->
<script src="<?php echo base_url(); ?>assetsfe/js/bootstrap.min.js" type="text/javascript"></script>
<!-- carousel Js -->
<script src="<?php echo base_url(); ?>assetsfe/js/plugin/owl.carousel.js" type="text/javascript"></script>
<!-- fancybox Js -->
<script src="<?php echo base_url(); ?>assetsfe/js/jquery.mousewheel-3.0.6.pack.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assetsfe/js/jquery.fancybox.pack.js" type="text/javascript"></script>
<!-- carousel Js -->
<script src="<?php echo base_url(); ?>assetsfe/js/jquery.parallax-1.1.3.js" type="text/javascript"></script>
<!--prettyPhotoprettyPhoto-->
<script type="text/javascript" src="<?php echo base_url(); ?>assetsfe/js/jquery.prettyPhoto.js"></script>
<!-- Fun Factor / Counter -->
<script type="text/javascript" src="<?php echo base_url(); ?>assetsfe/js/jquery.elevateZoom-3.0.8.min.js"></script>
<!-- Price Filter -->
<script type="text/javascript" src="<?php echo base_url(); ?>assetsfe/js/price-filter.js"></script>

<!-- custom Js -->
<script src="<?php echo base_url(); ?>assetsfe/js/custom.js" type="text/javascript"></script>

