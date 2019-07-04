<?php

$currentPrice=0;
$name='';
$loginroute='login';
$logintext='Login';


$signuproute='register';
$signuptext='Sign Up';

if (isset($this->session->userdata['current_price'])) {
	$currentPrice = ($this->session->userdata['current_price']);
}

if (isset($this->session->userdata['client_in'])) {

	$firstname = ($this->session->userdata['client_in']['firstname']);
	$email = ($this->session->userdata['client_in']['email']);
	$lastname = ($this->session->userdata['client_in']['lastname']);
	$name = $firstname." ".$lastname;

	$loginroute='dashboard';
	$logintext='Dashboard';

	$signuproute='logout';
	$signuptext='Logout';


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Getdiesel.ng</title>
	<!-- Favicone Icon -->
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
</head>

<body>

<!-- Site Wraper -->
<div class="wrapper">
	<!-- HEADER -->
	<!--Start header area-->
	<header class="header__block">
		<div class="top-part__block ptb-15">

			<div class="container">
				<div class="row">
					<div class="col-sm-7">
						<p>
							Welcome <?php echo ": ".$name; ?>
						</p>
					</div>
					<div class="col-sm-5">
						<div class="social-link__block text-right">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-google-plus"></i></a>
							<a href="#"><i class="fa fa-linkedin"></i></a>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="middel-part__block ptb-20">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="logo">
							<a href="index1.html">
								<img src="<?php echo base_url(); ?>assetsfe/images/logo.png" alt="Logo">
							</a>
						</div>
					</div>
					<div class="col-md-8">
						<div class="top-info__block text-right">
							<ul>
								<li>
									<i class="fa fa-map-marker"></i>
									<p>
										4, Dipeolu street, Off Allen Avenue, <p>Ikeja, Lagos State</p>
									</p>
								</li>
								<li>
									<i class="fa fa-phone"></i>
									<p>+2348060996663<p>+2348073456219</p></p>
								</li>
								<li>
									<i class="fa fa-envelope-o"></i>
									<p>Send us a mail<p>info@getdiesel.ng</p>	</p>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="navgation__block stricky-header__top">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="main-menu__block">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
									<span class="sr-only"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a class="navbar-brand visible-xs" href="#">
									<img src="<?php echo base_url(); ?>assetsfe/images/logo.png" alt="">
								</
							</div>

							<!--===Navigation===-->
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<ul class="nav navbar-nav mobile-menu">
									<li> <a href="index">Home</a></li>
									<li> <a href="about">About us</a>
										<ul class="dropdown-menu">
											<li> <a href="about">About us</a> </li>
											<li> <a href="">Privacy Policy</a> </li>
											<li> <a href="">Terms & Conditions</a> </li>
										</ul>
									</li>

									<li> <a href="<?php echo $loginroute ?>"><?php echo $logintext ?></a>
<!--										<ul class="dropdown-menu">-->
<!--											<li> <a href="login">Login</a></li>-->
<!--											<li> <a href="register">Sign Up</a></li>-->
<!---->
<!--										</ul>-->
									</li>
									<li> <a href="<?php echo $signuproute ?>"><?php echo $signuptext ?></a>

									<li> <a href="merchant/login">Merchants</a>
<!--										<ul class="dropdown-menu">-->
<!--											<li> <a href="merchant/login">Login</a></li>-->
<!--											<li> <a href="merchant/register">Sign Up</a></li>-->
<!---->
<!--										</ul>-->
									</li>

									<li> <a href="index">Make Order</a></li>
									<li> <a href=""></a></li>
									<li> <a href=""></a></li>
									<li> <a href=""></a></li>
									<li> <a href=""></a></li>

									<li><a class="custom_btn__block">Price/litre: <?php echo 'N '.currentPrice(); ?></a></li>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div>
		<br><br>
	</div>
