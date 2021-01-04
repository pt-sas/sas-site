<?= $this->extend('frontend/overview') ?>

<!-- CONTENT -->
<?= $this->section('content') ?>
<div class="jumbotron jumbotron-fluid mb-0">
	<div class="container text-center">
		<h1 class="display-3">Images</h1>
		<p class="lead">Whether you have a question about features, trials, pricing, need a demo, or anything else, our team is ready to answer all your questions</p>
	</div>
</div>
<div class="bg-light py-5" id="gallery">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row justify-content-md-center">
					<div class="col-md-4 my-3">
						<div class="card shadow border-0 rounded-0">
						<img class="card-img-top" src="/images/landing/first.svg" alt="">
						<div class="card-body">
							<h4 class="card-title">Category Name</h4>
							<a href=""><small>View More</small></a>
						</div>
						</div>
					</div>
					<div class="col-md-4 my-3">
						<div class="card shadow border-0 rounded-0">
						<img class="card-img-top" src="/images/landing/second.svg" alt="">
						<div class="card-body">
							<h4 class="card-title">Category Name</h4>
							<a href=""><small>View More</small></a>
						</div>
						</div>
					</div>
					<div class="col-md-4 my-3">
						<div class="card shadow border-0 rounded-0">
						<img class="card-img-top" src="/images/landing/third.svg" alt="">
						<div class="card-body">
							<h4 class="card-title">Category Name</h4>
							<a href=""><small>View More</small></a>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection() ?>