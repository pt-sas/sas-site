<?= $this->extend('frontend/overview') ?>

<!-- CONTENT -->
<?= $this->section('content') ?>

<div id="carouselJumboId" class="carousel slide carousel-fade" data-ride="carousel" data-interval="6000">
	<ol class="carousel-indicators">
		<li data-target="#carouselJumboId" data-slide-to="0" class="active"></li>
		<li data-target="#carouselJumboId" data-slide-to="1"></li>
		<li data-target="#carouselJumboId" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner" role="listbox">
		<div class="carousel-item active">
			<img src="/images/landing/first.svg" style="width:100%;min-height: calc(50vh - 4.125rem);max-height: calc(100vh - 4.125rem);">
			<div class="carousel-caption justify-content-center align-items-center">
				<div>
					<h2>Performance Optimization</h2>
					<p>We monitor and optimize your site's long-term performance</p>
					<span class="btn btn-sm btn-secondary">Learn How</span>
				</div>
			</div>
		</div>
		<div class="carousel-item">
			<img src="/images/landing/second.svg" style="width:100%;min-height: calc(50vh - 4.125rem);max-height: calc(100vh - 4.125rem);">
			<div class="carousel-caption justify-content-center align-items-center">
				<div>
					<h2>Performance Optimization</h2>
					<p>We monitor and optimize your site's long-term performance</p>
					<span class="btn btn-sm btn-secondary">Learn How</span>
				</div>
			</div>
		</div>
		<div class="carousel-item">
			<img src="/images/landing/third.svg" style="width:100%;min-height: calc(50vh - 4.125rem);max-height: calc(100vh - 4.125rem);">
			<div class="carousel-caption justify-content-center align-items-center">
				<div>
					<h2>Performance Optimization</h2>
					<p>We monitor and optimize your site's long-term performance</p>
					<span class="btn btn-sm btn-secondary">Learn How</span>
				</div>
			</div>
		</div>
	</div>
	<a class="carousel-control-prev" href="#carouselJumboId" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselJumboId" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>
<div class="bg-white">
	<div class="container">
		<div class="section-row">
			<div class="col-md-12">
				<h1 class="section-heading-center">About this page</h1>
				<div class="row justify-content-md-center">
					<div class="col-md-8 text-center">
						<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>
						<p>If you would like to edit this page you will find it located at:</p>
						<p>The corresponding controller for this page can be found at:</p>
					</div>
				</div>
			</div>
		</div>
		<div class="section-row">
			<div class="col-md-12">
				<h1 class="section-heading-center">About this page</h1>
				<div class="row justify-content-md-center">
					<div class="col-md-8 text-center">
						<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>
						<p>If you would like to edit this page you will find it located at:</p>
						<p>The corresponding controller for this page can be found at:</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="bg-light section">
	<div class="container">
		<h1 class="section-heading-center">Our Brands</h1>
		<div class="row justify-content-center align-items-center">
			<div class="col-md-2 col-sm-6 col-12 mb-5 mb-md-0">
				<img src="/images/principal/philips.svg" class="mx-auto d-block"  style="width:100%;max-width:200px" alt="Philips">
			</div>
			<div class="col-md-2 col-sm-6 col-12 mb-5 mb-md-0">
				<img src="/images/principal/panasonic.svg" class="mx-auto d-block"  style="width:100%;max-width:200px" alt="Panasonic">
			</div>
			<div class="col-md-2 col-sm-6 col-12 mb-5 mb-md-0">
				<img src="/images/principal/legrand.svg" class="mx-auto d-block"  style="width:100%;max-width:200px" alt="Legrand">
			</div>
			<div class="col-md-2 col-sm-6 col-12 mb-5 mb-md-0">
				<img src="/images/principal/schneider.svg" class="mx-auto d-block"  style="width:100%;max-width:200px" alt="Schneider">
			</div>
			<div class="col-md-2 col-sm-12 col-12 mb-0 mb-md-0">
				<img src="/images/principal/supreme.svg" class="mx-auto d-block"  style="width:100%;max-width:200px" alt="Supreme">
			</div>
		</div>
	</div>
</div>
<?= $this->endSection() ?>
