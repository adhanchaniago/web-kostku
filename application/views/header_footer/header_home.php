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
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
		
		<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
		<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
		<link href='https://fonts.googleapis.com/css?family=Titillium Web' rel='stylesheet'>
		
		<style type="">
			.form-control-borderless {
			    border: none;
			}

			.form-control-borderless:hover, .form-control-borderless:active, .form-control-borderless:focus {
			    border: none;
			    outline: none;
			    box-shadow: none;
			}
		</style>
	</head>
	<body style="background-color: #F0F3F5">
		<section style="background-image: url('<?=base_url()?>img/bghome.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center; height: 100% ">
	      <!-- Put anything you want here! There is just a spacer below for demo purposes! -->
	      <div style="height: 340px;">
	      	<nav class="navbar navbar-expand-md fixed-top" style="background-color: #FF000000; color: #FFFFFE;"> <!--  ff000000 -->
			<div class="container-fluid">
	      		<a href="<?php echo site_url('Kostku/'); ?>">
					<img style="padding-left: 10px;margin-top: 5px;" src="<?=base_url()?>assets/img/logo_main_white.png" height="80" width="174">
				</a>

				<div class="collapse navbar-collapse" id="navbarCollapse">	
					<ul class="navbar-nav navbar-right" style="padding-right: 30px; padding-top: 30px">
						<a href="<?php echo site_url('Kostku/daftar'); ?>"><button type="button" class="btn btn-default">Login User</button></a>
					</ul>
				</div>
			</div>
			</nav>
	      	<center>
	      		<br><br>
				<div style="font-size: 40px;font-weight: bold; color: #ffffff">Mau Cari Kostan?</div>

				<div style="font-size: 20px;font-weight: bold; color: #ffffff;margin-top: -10px">Dapatkan Info Kost Murah, Kost Harian, Kost Bebas dan Info Kosan lainnya di Sini!</div>
				
	      		<br>
	      		<?php echo form_open('Helpmy/search');?>
					  	<?php echo validation_errors(); ?>
					  	<div class="container">
						    <br/>
							<div class="row justify-content-center">
						        <div class="col-12 col-md-10 col-lg-8">
						            <form class="card card-sm">
										<div class="card-body row no-gutters align-items-center">
											<div class="col-auto">
												<i class="fas fa-search h4 text-body"></i>
											</div>
											<div class="col">
												<input class="form-control form-control-lg form-control-borderless" type="search" placeholder="Search topics or keywords">
											</div>
											<div class="col-auto">
												<button class="btn btn-lg btn-success" type="submit">Search</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					  		
			    <?php echo form_close(); ?>
			</center>
	      </div>
	    </section>