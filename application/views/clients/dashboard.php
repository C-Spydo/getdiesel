<?php


if (isset($this->session->userdata['client_in'])) {

	//print_r($this->session->userdata['client_in']);
	$firstname = ($this->session->userdata['client_in']['firstname']);
	$email = ($this->session->userdata['client_in']['email']);
	$lastname = ($this->session->userdata['client_in']['lastname']);
	$name=$firstname." ".$lastname;
	$uuid=($this->session->userdata['client_in']['uuid']);

}
else{

	redirect(base_url()."login");
}
	?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>User Dashboard &mdash; GetDiesel</title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<!-- CSS Libraries -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>node_modules/jqvmap/dist/jqvmap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>node_modules/weathericons/css/weather-icons.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>node_modules/weathericons/css/weather-icons-wind.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>node_modules/summernote/dist/summernote-bs4.css">

	<!-- Template CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/components.css">
</head>

<body>
<div id="app">
	<div class="main-wrapper">
		<div class="navbar-bg"></div>
		<nav class="navbar navbar-expand-lg main-navbar">
			<form class="form-inline mr-auto">
				<ul class="navbar-nav mr-3">
					<li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
				</ul>

			</form>
			<ul class="navbar-nav navbar-right">

				<li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
						<img alt="image" src="<?php echo base_url(); ?>assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
						<div class="d-sm-none d-lg-inline-block"><?php echo $name ?></div></a>
					<div class="dropdown-menu dropdown-menu-right">
						<a href="?link=5" class="dropdown-item has-icon">
							<i class="far fa-user"></i> Profile
						</a>
						<div class="dropdown-divider"></div>
						<a href="logout" class="dropdown-item has-icon text-danger">
							<i class="fas fa-sign-out-alt"></i> Logout
						</a>
					</div>
				</li>
			</ul>
		</nav>
		<div class="main-sidebar">
			<aside id="sidebar-wrapper">
				<div class="sidebar-brand">
					<a href="?link=1">GetDiesel</a>
				</div>
				<div class="sidebar-brand sidebar-brand-sm">
					<a href="?link=1">GD</a>
				</div>
				<ul class="sidebar-menu">

					<li class="menu-header">Menu</li>
					<li><a class="nav-link" href="?link=2"><i class="far fa-square"></i> <span>View Orders</span></a></li>
					<li><a class="nav-link" href="?link=5"><i class="far fa-square"></i> <span>Profile</span></a></li>
					<li><a class="nav-link" href="logout"><i class="far fa-square"></i> <span>Logout</span></a></li>
				</ul>

				<div class="mt-4 mb-4 p-3 hide-sidebar-mini">
					<a href="?link=7" class="btn btn-primary btn-lg btn-block btn-icon-split">
						<i class="fas fa-rocket"></i> Help & Support
					</a>
				</div>
			</aside>
		</div>

		<!-- Main Content -->
		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<h1><?php echo $name." - " ?>User Dashboard</h1>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-6 col-sm-6 col-12">
						<div class="card card-statistic-1">
							<div class="card-icon bg-primary">
								<i class="far fa-user"></i>
							</div>
							<div class="card-wrap">
								<div class="card-header">
									<h4>Total Orders</h4>
								</div>
								<div class="card-body">
									<?php echo countOrders($uuid)." ltrs"; ?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-12">
						<div class="card card-statistic-1">
							<div class="card-icon bg-danger">
								<i class="far fa-newspaper"></i>
							</div>
							<div class="card-wrap">
								<div class="card-header">
									<h4>Total Orders</h4>
								</div>
								<div class="card-body">
									<?php echo getLitres($uuid)." ltrs"; ?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-12">
						<div class="card card-statistic-1">
							<div class="card-icon bg-warning">
								<i class="far fa-file"></i>
							</div>
							<div class="card-wrap">
								<div class="card-header">
									<h4>Delivered</h4>
								</div>
								<div class="card-body">
									<?php echo getDelivered($uuid)." ltrs"; ?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-12">
						<div class="card card-statistic-1">
							<div class="card-icon bg-success">
								<i class="fas fa-circle"></i>
							</div>
							<div class="card-wrap">
								<div class="card-header">
									<h4>Pending</h4>
								</div>
								<div class="card-body">
									<?php echo getPending($uuid)." ltrs"; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<?php
					if(isset($_GET['link'])){
						$link= $_GET['link'];

						if($link=='2'){
							$this->view('clients/vieworders');
						}
						if($link=='5'){
							$this->view('clients/profile');
						}
					}
					?>
				</div>
			</section>
		</div>
		<footer class="main-footer">
			<div class="footer-left">
				Copyright &copy; 2019 <div class="bullet"></div> Design By <a href="https://cspydo.com.ng/" target="_blank">C-Spydo</a>
			</div>
			<div class="footer-right">
				1.0.0
			</div>
		</footer>
	</div>
</div>

<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/stisla.js"></script>

<!-- JS Libraies -->
<script src="<?php echo base_url(); ?>node_modules/simpleweather/jquery.simpleWeather.min.js"></script>
<script src="<?php echo base_url(); ?>node_modules/chart.js/dist/Chart.min.js"></script>
<script src="<?php echo base_url(); ?>node_modules/jqvmap/dist/jquery.vmap.min.js"></script>
<script src="<?php echo base_url(); ?>node_modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="<?php echo base_url(); ?>node_modules/summernote/dist/summernote-bs4.js"></script>
<script src="<?php echo base_url(); ?>node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

<!-- Template JS File -->
<script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>

<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>assets/js/page/index-0.js"></script>
</body>
</html>
