<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Bangun Datar</title>
		<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
		<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
		
	</head>
	<body>
		<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
			<a class="navbar-brand" href="#">Malang Paradise</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="<?php echo site_url('wisata'); ?>">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo site_url('wisata/list_wisata'); ?>">List Wisata</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo site_url('wisata/tambahWisata'); ?>">Tambah Wisata</a>
					</li>
				</ul>
				<ul class="navbar-nav navbar-right" style="margin-right: 10px">
					<li class="nav-item">
						<a class="nav-link" href="<?php echo site_url('wisata/daftar'); ?>"><span class="glyphicon glyphicon-user"> </span><?php echo $username ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo site_url('wisata/logout'); ?>"><span class="glyphicon glyphicon-user"> </span> Logout</a>
					</li>
				</ul>
			</div>
		</nav>
