<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- JaGO CSS -->
	<link rel="stylesheet" href="<?php echo base_url('webassets/css/jago.css'); ?>">

	<!-- Animate -->
	<link rel="stylesheet" href="<?php echo base_url('webassets/plugin/animate/animate.css'); ?>">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">

	<!-- fontawesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

	<!-- <link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css" type="text/css"> -->
	<link rel="stylesheet" href="<?php echo base_url('webassets/plugin/openlayer/ol.css'); ?>" type="text/css">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://unpkg.com/multiple-select@1.3.1/dist/multiple-select.min.css">

	<link rel="stylesheet" href="<?php echo base_url('webassets/plugin/picker/picker.css'); ?>" type="text/css">


	<!-- Title -->
	<title><?php echo $judul; ?></title>
</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-light shadow-sm sticky-top py-3" style="background:white">
		<div class="container">
			<a class="navbar-brand judulWeb" href="<?php echo base_url(); ?>">JaGO</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav">
					<a class="nav-item nav-link <?php if (current_url() == base_url() . "index.php") {
													echo "aktif";
												} ?>" href="<?php echo base_url(); ?>">Beranda</a>
					<a class="nav-item nav-link <?php if (preg_match('/cari\/cariguru/', current_url())) {
													echo "aktif";
												} ?>" href="<?php echo base_url('cari/cariguru'); ?>">Cari Guru</a>
					<a class="nav-item nav-link <?php if (preg_match('/home\/bantuan/', current_url())) {
													echo "aktif";
												} ?>"" href=" <?php echo base_url('home/bantuan'); ?>">Bantuan</a>
					<a class="nav-item nav-link <?php if (preg_match('/home\/aboutus/', current_url())) {
													echo "aktif";
												} ?>"" href=" <?php echo base_url('home/aboutus'); ?>">Tentang Kami</a>
				</div>

				<?php if (!$this->session->userdata('email')) : ?>
					<div class="navbar-nav ml-auto">
						<a class="mtMobile nav-item nav-link btn btn-border-blue2 mx-2 px-5 radiusBorder btnHover" href="<?php echo base_url('home/login'); ?>">Login</a>
						<a class="mtMobile mbMobile nav-item nav-link btn bgBlue2 mx-2 px-5 radiusBorder text-white btnHover" href="<?php echo base_url('home/register'); ?>">Register</a>
					</div>
				<?php endif; ?>
				<?php if ($this->session->userdata('email')) : ?>
					<div class="navbar-nav ml-auto">
						<a class="mtMobile mbMobile nav-item nav-link btn bgBlue2 mx-2 px-5 radiusBorder text-white btnHover" href="<?php echo base_url('dashboard'); ?>">Dashboard</a>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</nav>

	<?php if ($this->session->flashdata('danger')) : ?>
		<div class="data-danger" data-danger="<?php echo $this->session->flashdata('danger'); ?>""></div>
	<?php endif; ?>

	<?php if ($this->session->flashdata('success')) : ?>
							<p class=" data-success" data-success="<?php echo $this->session->flashdata('success'); ?>"></div>
	<?php endif; ?>