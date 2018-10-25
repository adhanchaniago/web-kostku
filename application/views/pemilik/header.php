<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="FaberNainggolan">
		<title>Kost.ku</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/jquery.dataTables.css'?>">
		
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
    <body style="background-color: #F0F3F5">
		<nav class="navbar navbar-expand-md fixed-top" style="background-color: #27AB27; color: #FFFFFE; height: 50px">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" style="color: #FFFFFE;" href="<?php echo site_url('Kostku/'); ?>">Kost.ku</a>
				</div>

				<div id="navbar" class="collapse navbar-collapse device-fixed-width">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="<?=site_url('Login/logout')?>">
								<i class="fa fa-sign-out"></i> Logout
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>