<?= $this->extend('frontend/overview') ?>

<!-- CONTENT -->
<?= $this->section('content') ?>
<div id="carouselJumboId" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#carouselJumboId" data-slide-to="0" class="active"></li>
		<li data-target="#carouselJumboId" data-slide-to="1"></li>
		<li data-target="#carouselJumboId" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner" role="listbox">
		<div class="carousel-item active">
			<img src="/images/landing/first.svg" style="width:100%;height: calc(100vh - 4.125rem);">
		</div>
		<div class="carousel-item">
			<img src="/images/landing/second.svg" style="width:100%;height: calc(100vh - 4.125rem);">
		</div>
		<div class="carousel-item">
			<img src="/images/landing/third.svg" style="width:100%;height: calc(100vh - 4.125rem);">
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
<div class="bg-white py-5">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="light section-heading-center">About this page</h1>
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
<div class="bg-white py-5">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="light section-heading-center">About this page</h1>
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
<div class="bg-danger py-5">
	<div class="container text-white">
		<div class="row">
			<div class="col-md-12">
				<div class="row justify-content-md-center">
					<div class="col-md-3 d-flex flex-column">
						<h2 class="light">Latest News</h2>
						<a href="/news" class="mt-auto btn btn-outline-light w-50"><small>More News</small></a>
					</div>
					<div class="col-md-3 d-flex flex-column">
						<h6>25 December 2020</h6>
						<h4 class="light">Members who are a team-player, full of enthusiasm and desire for continuous learning.</h4>
						<a href="" class="mt-auto"><small>Read More</small></a>
					</div>
					<div class="col-md-3 d-flex flex-column">
						<h6>25 December 2020</h6>
						<h4 class="light">Members who are a team-player, full of enthusiasm and desire for continuous learning & improvements.</h4>
						<a href="" class="mt-auto"><small>Read More</small></a>
					</div>
					<div class="col-md-3 d-flex flex-column">
						<h6>25 December 2020</h6>
						<h4 class="light">Members who are a team-player, full of enthusiasm and desire for improvements.</h4>
						<a href="" class="mt-auto"><small>Read More</small></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="bg-light py-5">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="light section-heading-center">Our Principal</h1>
				<div class="row align-items-center">
					<div class="col-md-2 offset-md-1">
						<img src="/images/principal/philips.svg" class="mx-auto d-block"  style="width:100%" alt="Philips">
					</div>
					<div class="col-md-2">
						<img src="/images/principal/panasonic.svg" class="mx-auto d-block"  style="width:100%" alt="Panasonic">
					</div>
					<div class="col-md-2">
						<img src="/images/principal/legrand.svg" class="mx-auto d-block"  style="width:100%" alt="Legrand">
					</div>
					<div class="col-md-2">
						<img src="/images/principal/schneider.svg" class="mx-auto d-block"  style="width:100%" alt="Schneider">
					</div>
					<div class="col-md-2">
						<img src="/images/principal/supreme.svg" class="mx-auto d-block"  style="width:100%" alt="Supreme">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection() ?>
