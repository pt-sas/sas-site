<?= $this->extend('frontend/overview') ?>

<!-- CONTENT -->
<?= $this->section('content') ?>
<div class="jumbotron jumbotron-fluid">
	<div class="container text-center">
		<h1 class="display-3">Get in touch</h1>
		<p class="lead">Want to get in touch? We'd love to hear from you. Here's how you can reach us...</p>
	</div>
</div>
<div class="bg-white section" id="contact">
	<div class="container">
		<div class="row">
			<div class="col-md-7 text-left">
				<h3 class="section-heading">Contact Us</h3>
				<div class="row">
					<div class="col-md-12">
						<p>Interested in any of our products? Talk to our experts today</p>
						<p><strong>Sunter:</strong> +62 (021) 6583 1188</p>
						<p><strong>Tebet:</strong> +62 (021) 8370 8838</p>
						<p><strong>Glodok:</strong> +62 (021) 659 2247</p>
						<p><strong>Kenari:</strong> +62 (021) 3984 5733</p>
						<p><strong>Tangerang:</strong> +62 (021) 6583 1188</p>
						<p><strong>Email:</strong> sales@sahabatabadi.com | admin@sahabatabadi.com</p>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="card shadow border-0 rounded-0">
					<div class="card-body">
						<h3 class="section-heading-center">Get in touch with us</h3>
						<div class="row">
							<div class="col-md-12">
								<form action="" method="post" role="form" class="contactForm">
									<div class="form-floating">
										<input type="text" class="form-control" id="name" placeholder="Phone Number" autocomplete="off">
										<label for="name">Name</label>
									</div>
									<div class="form-floating">
										<input type="email" class="form-control" id="email" placeholder="name@example.com" autocomplete="off">
										<label for="email">Email address</label>
									</div>
									<div class="form-floating">
										<select class="form-select" style="width:100%" id="enquiry">
											<option value="1">General Enquiry</option>
											<option value="2">Sales Enquiry</option>
											<option value="3">Technical Support</option>
										</select>
									</div>
									<div class="form-floating">
										<input type="text" class="form-control" id="phone" placeholder="Phone Number" autocomplete="off">
										<label for="phone">Phone</label>
									</div>
									<div class="form-floating">
										<input type="text" class="form-control" id="subject" placeholder="Your Subject" autocomplete="off">
										<label for="subject">Subject</label>
									</div>
									<div class="form-floating">
										<textarea class="form-control" name="message" rows="5" placeholder="Your Message"autocomplete="off"></textarea>
										<label for="message">Message</label>
									</div>
									<div class="text-right"><button type="submit" name="submit" class="btn btn-primary btn-block" required="required">Submit Message</button></div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="bg-white row-fluid">
	<h1 class="section-heading-center">Visit Our Store</h1>
	<iframe width="100%" height="700px" allowfullscreen src="//umap.openstreetmap.fr/en/map/sahabat-abadi-sejahtera_545119?scaleControl=false&miniMap=false&scrollWheelZoom=false&zoomControl=true&allowEdit=false&moreControl=true&searchControl=null&tilelayersControl=true&embedControl=null&datalayersControl=true&onLoadPanel=undefined&captionBar=false"></iframe>
</div>
<?= $this->endSection() ?>