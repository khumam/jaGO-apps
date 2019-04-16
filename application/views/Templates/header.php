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

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">

	<!-- Title -->
	<title><?php echo $judul; ?></title>
</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-light shadow-sm sticky-top py-3" style="background:white">
		<div class="container">
			<a class="navbar-brand judulWeb" href="#">JaGO</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav">
					<a class="nav-item nav-link aktif" href="#">Home</a>
					<a class="nav-item nav-link" href="#">Features</a>
					<a class="nav-item nav-link" href="#">Pricing</a>
					<a class="nav-item nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
				</div>
				<div class="navbar-nav ml-auto">
					<a class="nav-item nav-link btn btn-outline-primary mx-2 px-5 radiusBorder" href="#">Home <span class="sr-only">(current)</span></a>
					<a class="nav-item nav-link btn btn-primary mx-2 px-5 radiusBorder text-white" href="#">Features</a>
				</div>
			</div>
		</div>
	</nav>