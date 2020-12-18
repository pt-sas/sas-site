<?= $this->extend('overview') ?>

<!-- CONTENT -->
<?= $this->section('content') ?>
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

<?= $this->endSection() ?>
