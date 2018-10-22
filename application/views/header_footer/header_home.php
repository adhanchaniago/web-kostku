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
		
	</head>
	<body style="background-color: #F0F3F5">
		<section style="background-image: url('<?=base_url()?>img/bghome.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center; height: 100% ">
	      <!-- Put anything you want here! There is just a spacer below for demo purposes! -->
	      <div style="height: 340px;">
	      	<nav class="navbar navbar-expand-md fixed-top" style="background-color: #FF000000; color: #FFFFFE;"> <!--  ff000000 -->
				<div class="collapse navbar-collapse" id="navbarCollapse">	
					<ul class="navbar-nav navbar-right" style="padding-right: 30px; padding-top: 30px">
						<a href="<?php echo site_url('Kostku/daftar'); ?>"><button type="button" class="btn btn-default">Login User</button></a>
					</ul>
				</div>
			</nav>
	      	<center>
	      		<br><br>
				<div style="font-size: 40px;font-weight: bold; color: #ffffff">Mau Cari Kostan?</div>
				<img style="margin-top:-220px" src="<?=base_url()?>img/P.png" width="184" height="90">
				<div style="font-size: 20px;font-weight: bold; color: #ffffff;margin-top: -30px">Dapatkan Info Kost Murah, Kost Harian, Kost Bebas dan Info Kosan lainnya di Sini!</div>
				
	      		<br>
	      		<?php echo form_open('Helpmy/search');?>
					  	<?php echo validation_errors(); ?>
					  	<div>
					  		<input style="width: 300px" type="text" class="form-control" name="srch" placeholder="Cari Lokasi di sini ..." required>
					  		<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Cari</button>
			            	
					  	</div>
					  		
			    <?php echo form_close(); ?>
			</center>
	      </div>
	    </section>

		
