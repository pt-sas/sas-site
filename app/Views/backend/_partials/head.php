<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?= $title ?> - HRMS SAS</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?= base_url('custom/image/logo.png') ?>" type="image/x-icon" />

	<!-- Fonts and icons -->
	<script src="<?= base_url('atlantis-pro/js/plugin/webfont/webfont.min.js') ?>"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Lato:300,400,700,900"]
			},
			custom: {
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
				urls: ['<?= base_url('atlantis-pro/css/fonts.css') ?>']
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- Custom styles for this template-->
	<link rel="stylesheet" href="<?= base_url('atlantis-pro/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('atlantis-pro/css/atlantis.css') ?>">

	<!-- SweetAlert2 -->
	<link rel="stylesheet" href="<?= base_url('atlantis-pro/js/plugin/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') ?>">
	<!-- Loader waitMe -->
	<link rel="stylesheet" href="<?= base_url('atlantis-pro/js/plugin/loader/waitMe.min.css') ?>">
	<link href="<?= base_url('custom/css/custom.css') ?>" rel="stylesheet">
</head>