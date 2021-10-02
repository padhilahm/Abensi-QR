<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Absensi - padhil.my.id</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?= base_url(); ?>assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="<?= base_url(); ?>assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?= base_url(); ?>assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/demo.css">
</head>
<body>
	<div class="wrapper overlay-sidebar">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue2">
				
				<a href="<?= base_url() ?>" class="logo">
					<img src="<?= base_url(); ?>assets/img/logo.svg" alt="navbar brand" class="navbar-brand">
				</a>
				
				
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>