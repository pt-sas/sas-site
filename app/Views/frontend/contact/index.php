<?= $this->extend('frontend/overview') ?>

<!-- CONTENT -->
<?= $this->section('content') ?>
<div id="content">
	<div class="jumbotron jumbotron-fluid mb-0">
		<div class="container text-center">
			<h1 class="display-3">Get in touch</h1>
			<p class="lead">Want to get in touch? We'd love to hear from you. Here's how you can reach us...</p>
		</div>
	</div>
	<div class="bg-white py-5" id="contact">
		<div class="container">
			<div class="row">
				<div class="col-md-7 text-left">
					<h3 class="light section-heading">Contact Us</h3>
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
							<h3 class="light section-heading-center">Get in touch with us</h3>
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
	<div class="bg-white py-5">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="light section-heading-center">Visit our store</h1>
					<div class="card bg-light">
						<div class="row">
							<div class="col-md-8">
								<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15867.931746394173!2d106.86316608202183!3d-6.132994599181256!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x535bdc6ed9b316cd!2sPT%20Sahabat%20Abadi%20Sejahtera!5e0!3m2!1sid!2sid!4v1607501552834!5m2!1sid!2sid" width="100%" height="500" frameborder="0" style="border:0" use="allowfullscreen"></iframe>
							</div>
							<div class="col-md-4">
								<h3>Head Quarter</h3>
								<p>Jalan Indokarya III Blok F1-2, Sunter Podomoro, Tanjung Priok, RT.5/RW.4, Papanggo, Tj. Priok, Kota Jkt Utara, DKI Jakarta 14340</p>
								
								<h5><b>Phone / Fax</b></h5>
								<p>+62 (021) 83708838</p>

								<h5><b>News / Media</b></h5>
								<p><a href="/news">Visit our Newsroom for contact info</a></p>
							</div>
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
					<div class="row my-4">
						<div class="col-md-6">
							<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15867.931746394173!2d106.86316608202183!3d-6.132994599181256!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x535bdc6ed9b316cd!2sPT%20Sahabat%20Abadi%20Sejahtera!5e0!3m2!1sid!2sid!4v1607501552834!5m2!1sid!2sid" width="100%" height="300" frameborder="0" style="border:0" use="allowfullscreen"></iframe>
						</div>
						<div class="col-md-6">
							<h3>Tebet (Store Location)</h3>
							<p>Jalan Indokarya III Blok F1-2, Sunter Podomoro, Tanjung Priok, RT.5/RW.4, Papanggo, Tj. Priok, Kota Jkt Utara, DKI Jakarta 14340</p>
							
							<h5>Phone / Fax</h5>
							<p>+62 (021) 83708838</p>
						</div>
					</div>
					<div class="row my-4">
						<div class="col-md-6 order-sm-1 order-2">
							<h3>Glodok (Store Location)</h3>
							<p>Jalan Indokarya III Blok F1-2, Sunter Podomoro, Tanjung Priok, RT.5/RW.4, Papanggo, Tj. Priok, Kota Jkt Utara, DKI Jakarta 14340</p>
							
							<h5>Phone / Fax</h5>
							<p>+62 (021) 6592247</p>
						</div>
						<div class="col-md-6 order-sm-2 order-1">
							<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15867.931746394173!2d106.86316608202183!3d-6.132994599181256!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x535bdc6ed9b316cd!2sPT%20Sahabat%20Abadi%20Sejahtera!5e0!3m2!1sid!2sid!4v1607501552834!5m2!1sid!2sid" width="100%" height="300" frameborder="0" style="border:0" use="allowfullscreen"></iframe>
						</div>
					</div>
					<div class="row my-4">
						<div class="col-md-6">
							<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15867.931746394173!2d106.86316608202183!3d-6.132994599181256!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x535bdc6ed9b316cd!2sPT%20Sahabat%20Abadi%20Sejahtera!5e0!3m2!1sid!2sid!4v1607501552834!5m2!1sid!2sid" width="100%" height="300" frameborder="0" style="border:0" use="allowfullscreen"></iframe>
						</div>
						<div class="col-md-6">
							<h3>Kenari (Store Location)</h3>
							<p>Jalan Indokarya III Blok F1-2, Sunter Podomoro, Tanjung Priok, RT.5/RW.4, Papanggo, Tj. Priok, Kota Jkt Utara, DKI Jakarta 14340</p>
							
							<h5>Phone / Fax</h5>
							<p>+62 (021) 39845733</p>
						</div>
					</div>
					<div class="row my-4">
						<div class="col-md-6 order-sm-1 order-2">
							<h3>Tangerang (Store Location)</h3>
							<p>Jalan Indokarya III Blok F1-2, Sunter Podomoro, Tanjung Priok, RT.5/RW.4, Papanggo, Tj. Priok, Kota Jkt Utara, DKI Jakarta 14340</p>
							
							<h5>Phone / Fax</h5>
							<p>+62 (021) 65831188</p>
						</div>
						<div class="col-md-6 order-sm-2 order-1">
							<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15867.931746394173!2d106.86316608202183!3d-6.132994599181256!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x535bdc6ed9b316cd!2sPT%20Sahabat%20Abadi%20Sejahtera!5e0!3m2!1sid!2sid!4v1607501552834!5m2!1sid!2sid" width="100%" height="300" frameborder="0" style="border:0" use="allowfullscreen"></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection() ?>