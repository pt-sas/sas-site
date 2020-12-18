<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Welcome to CodeIgniter 4!</title>
	<meta name="description" content="The small framework with powerful features">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico" />

	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" crossorigin="anonymous" />

	<!-- STYLES -->

	<style {csp-style-nonce}>
		section {
			margin-top: 6.5em
		}
	</style>
</head>

<body>

	<!-- HEADER: MENU + HEROE SECTION -->
	<header>

		<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
			<div class="container p-4">
				<a class="navbar-brand" href=""><img src="https://mdbootstrap.com/img/logo/mdb-transparent.png" height="30" alt=""></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent-4">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active">
							<a class="nav-link" href="#">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">About Us</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Product </a>
							<div class="dropdown-menu dropdown-menu-right dropdown-cyan" aria-labelledby="navbarDropdownMenuLink-4">
								<a class="dropdown-item" href="#">Philips</a>
								<a class="dropdown-item" href="#">Panasonic</a>
								<a class="dropdown-item" href="#">Legrand</a>
								<a class="dropdown-item" href="#">Schneider</a>
								<a class="dropdown-item" href="#">Supreme</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Careers</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Contact Us</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>

	</header>

	<!-- CONTENT -->

	<section>
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<h1 class="display-3">Fluid jumbo heading</h1>
				<p class="lead">Jumbo helper text</p>
				<hr class="my-2">
				<p>More info</p>
				<p class="lead">
					<a class="btn btn-primary btn-lg" href="Jumbo action link" role="button">Jumbo action name</a>
				</p>
			</div>
		</div>

		<div class="container p-4">
			<h1>About this page</h1>

			<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

			<p>If you would like to edit this page you will find it located at:</p>

			<pre><code>app/Views/welcome_message.php</code></pre>

			<p>The corresponding controller for this page can be found at:</p>

			<pre><code>app/Controllers/Home.php</code></pre>
		</div>

	</section>



	<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->
	<footer class="bg-light text-center text-lg-start">
		<div class="container p-4">
			<div class="row">
				<div class="col-md-4 mb-4 mb-md-0 text-left">
					<h5 class="font-weight-bold">PT Sahabat Abadi Sejahtera</h5>
					<p>
						Jalan Indokarya III Blok F1-2, Sunter Podomoro, Tanjung Priok, RT.5/RW.4, Papanggo, Tj. Priok, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14340
					</p>
					<p>
						<a href="tel:(021) 65831188">(021) 65831188</a>
						<br>
						<a href="mailto:admin@sahabatabadi.com">admin@sahabatabadi.com</a>
					</p>
				</div>
				<div class="col-md-2 col-sm-4 col-6 offset-md-1 mb-4 mb-md-0 text-left">
					<h5 class="font-weight-bold">Product</h5>

					<ul class="list-unstyled mb-0">
						<li>
							<a href="#!" class="text-dark">Philips</a>
						</li>
						<li>
							<a href="#!" class="text-dark">Panasonic</a>
						</li>
						<li>
							<a href="#!" class="text-dark">Legrand</a>
						</li>
						<li>
							<a href="#!" class="text-dark">Schneider</a>
						</li>
						<li>
							<a href="#!" class="text-dark">Supreme</a>
						</li>
					</ul>
				</div>
				<div class="col-md-2 col-sm-4 col-6 mb-4 mb-md-0 text-left">
					<h5 class="font-weight-bold">Quick Links</h5>

					<ul class="list-unstyled mb-0">
						<li>
							<a href="#!" class="text-dark">About Us</a>
						</li>
						<li>
							<a href="#!" class="text-dark">News & Gallery</a>
						</li>
						<li>
							<a href="#!" class="text-dark">Careers</a>
						</li>
						<li>
							<a href="#!" class="text-dark">Contact Us</a>
						</li>
					</ul>
				</div>
				<div class="col-md-3 text-left">
					<h5 class="font-weight-bold">Follow Us On</h5>

					<ul class="list-unstyled mb-0">
						<li>
							<a href="https://www.linkedin.com/company/pt-sahabat-abadi-sejahtera" class="text-dark"><i class="fa fa-linkedin fa-fw"></i> Sahabat Abadi Sejahtera</a>
						</li>
						<li>
							<a href="https://www.facebook.com/PTSahabat-Abadi-Sejahtera-Philips-Indonesia-Sunter-137769446408477/" class="text-dark"><i class="fa fa-facebook fa-fw"></i> Sahabat Abadi Sejahtera</a>
						</li>
						<li>
							<a href="https://www.instagram.com/sahabat_abadi_sejahtera" class="text-dark"><i class="fa fa-instagram fa-fw"></i> Sahabat Abadi Sejahtera</a>
						</li>
						<li>
							<a href="https://www.youtube.com/channel/UCeB2XhHrFdFD3P1cw3Q9swg" class="text-dark"><i class="fa fa-youtube-play fa-fw"></i> Sahabat Abadi Sejahtera</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="p-3" style="background-color: rgba(0, 0, 0, 0.2)">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						&copy; <?= date('Y') ?> <a href="">Sahabat Abadi Sejahtera</a>. All rights reserved.
					</div>
				</div>
			</div>
		</div>
	</footer>

	<!-- jQuery & Bootstrap-->
	<script src="<?php echo base_url('js/jquery-3.5.1.min.js') ?>"></script>
	<script src="<?php echo base_url('js/bootstrap.min.js') ?>"></script>
</body>

</html>