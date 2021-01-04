<?= $this->extend('frontend/overview') ?>

<!-- CONTENT -->
<?= $this->section('content') ?>
<div id="content">
	<div class="jumbotron jumbotron-fluid mb-0">
		<div class="container text-center">
			<h1 class="display-3">We’d love to hear from you</h1>
			<p class="lead">Whether you have a question about features, trials, pricing, need a demo, or anything else, our team is ready to answer all your questions</p>
		</div>
	</div>
	<div class="bg-white py-5 mb-0" id="contact">
		<div class="container">
			<div class="row">
				<div class="col-md-7 text-left">
					<h3 class="light mb-4">Contact Us</h3>
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
							<h3 class="light text-center mb-4">Get in touch with us</h3>
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
	<div class="bg-light py-5 mb-0">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="light section-heading">Office locations</h1>
					<div class="row">
						<div class="col-md-4 my-3">
							<div class="row">
								<div class="col-md-12">
									<h4>HQ - Sunter</h4>
									<p>Jalan Indokarya III Blok F1-2, Sunter Podomoro, Tanjung Priok, RT.5/RW.4, Papanggo, Tj. Priok, Kota Jkt Utara, DKI Jakarta 14340</p>
									<p>Reception/General enquiries: +62 (021) 65831188</p>
								</div>
							</div>
						</div>
						<div class="col-md-4 my-3">
							<div class="row">
								<div class="col-md-12">
									<h4>Tebet</h4>
									<p>Jalan Indokarya III Blok F1-2, Sunter Podomoro, Tanjung Priok, RT.5/RW.4, Papanggo, Tj. Priok, Kota Jkt Utara, DKI Jakarta 14340</p>
									<p>Reception/General enquiries: +62 (021) 83708838</p>
								</div>
							</div>
						</div>
						<div class="col-md-4 my-3">
							<div class="row">
								<div class="col-md-12">
									<h4>Glodok</h4>
									<p>Jalan Indokarya III Blok F1-2, Sunter Podomoro, Tanjung Priok, RT.5/RW.4, Papanggo, Tj. Priok, Kota Jkt Utara, DKI Jakarta 14340</p>
									<p>Reception/General enquiries: +62 (021) 6592247</p>
								</div>
							</div>
						</div>
						<div class="col-md-4 my-3">
							<div class="row">
								<div class="col-md-12">
									<h4>Kenari</h4>
									<p>Jalan Indokarya III Blok F1-2, Sunter Podomoro, Tanjung Priok, RT.5/RW.4, Papanggo, Tj. Priok, Kota Jkt Utara, DKI Jakarta 14340</p>
									<p>Reception/General enquiries: +62 (021) 39845733</p>
								</div>
							</div>
						</div>
						<div class="col-md-4 my-3">
							<div class="row">
								<div class="col-md-12">
									<h4>Tangerang</h4>
									<p>Jalan Indokarya III Blok F1-2, Sunter Podomoro, Tanjung Priok, RT.5/RW.4, Papanggo, Tj. Priok, Kota Jkt Utara, DKI Jakarta 14340</p>
									<p>Reception/General enquiries: +62 (021) 65831188</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection() ?>