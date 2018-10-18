<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Kost.ku</title>
		<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/styleku.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
		
		<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
		<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
		<link href='https://fonts.googleapis.com/css?family=Titillium Web' rel='stylesheet'>

		<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/login.css">

		
	</head>
	<body style="background-color: #F0F3F5">
		<nav class="navbar navbar-expand-md fixed-top" style="background-color: #27AB27; color: #FFFFFE;">
			<div class="container-fluid" style="margin-left: 2%">
			<a href="<?php echo site_url('Kostku/'); ?>">
				<img style="padding-left: 10px" src="<?=base_url()?>img/P.png" width="81" height="36">
			</a>
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="navbar-nav mr-auto navbar-form">
					<?php echo form_open('Kostku/search');?>
					  	<?php echo validation_errors(); ?>
			                <input style="width: 500px" type="text" class="form-control" name="srch" placeholder="Cari Pertanyaanmu di sini ..." required>
			            	<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Cari</button>
			          <?php echo form_close(); ?>
				</ul>
				<ul class="navbar-nav navbar-right" style="margin-right: 10px; ">
					<?php 
						if ($this->session->userdata('kostku_logged_in')) {
						$sessData=$this->session->userdata('kostku_logged_in');
						$this->load->view('header_footer/nav_login');
					}else{
						$this->load->view('header_footer/nav_nonlogin');
					}?>
				</ul>
			</div>
			</div>
		</nav>
