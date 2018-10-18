<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Bangun Datar</title>
		<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/styleku.css">

		
	</head>
	<body style="background-color: #F0F3F5">
		<nav class="navbar navbar-expand-md fixed-top" style="background-color: #57B2F8; color: #FFFFFE;">
			<div class="container-fluid" style="margin-left: 2%">
				<a href="<?php echo site_url('Helpmy/'); ?>">
					<img style="padding-left: 10px" src="<?=base_url()?>img/P.png" width="81" height="36">
				</a>
				<div class="center">
					<ul class="nav nav-tabs" style="background-color: #F0F0F0">
						
						 	<li <?php if ($act=="user"){?> class="active" <?php } ?>><a href="<?php echo site_url('Admin/userlist')?>" >User</a></li>
							<li <?php if ($act=="pertanyaan"){?> class="active" <?php } ?>><a href="<?php echo site_url('Admin/soallist')?>" >Pertanyaan</a></li>
							<li <?php if ($act=="jawaban"){?> class="active" <?php } ?>><a href="<?php echo site_url('Admin/jawablist')?>" >Jawaban</a></li>
							<li <?php if ($act=="mapel"){?> class="active" <?php } ?>><a href="<?php echo site_url('Admin/mapellist')?>" >Matapelajaran</a></li>
						
					</ul>
				</div>
					<ul class="navbar-nav navbar-right" style="margin-right: 10px; ">
						<?php 
							if ($this->session->userdata('logged_in')) {
							$sessData=$this->session->userdata('logged_in');
							$this->load->view('header_footer/nav_login');
						}else{
							$this->load->view('header_footer/nav_nonlogin');
						}?>
					</ul>
				
			</div>
		</nav>
