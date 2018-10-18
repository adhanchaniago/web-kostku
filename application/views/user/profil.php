<?php $this->load->view('header_footer/header'); 
		$sessData=$this->session->userdata('logged_in');
?>

<style>
	.buttono {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    text-align: center;
    text-decoration: none;
    display: inline-block;
	padding: 5px 10px;
    /*
    font-size: 16px;
    
    margin: 4px 2px;*/
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
	}
	.button4 {
    background-color: white;
    color: black;
    border: 2px solid #e7e7e7;
	}

	.button4:hover {background-color: #e7e7e7;}

	.button_like {
    background-color: white;
    color: #FF796B;
    border: 2px solid #e7e7e7;
	}

	.button_like:hover {
		background-color: #FF796B;
		color: #FFFFFF;
		border: 2px solid #FF796B;
	}


</style>

<?php  foreach ($alluser as $key) { ?>
	<input type="hidden" id="foto<?php echo $key->username ?>" value="<?php echo $key->foto ?>">
<?php } ?>

<div class="container-fluid" style="padding-left: 8%;padding-right:  8%; padding-top: 1%">

	<div class="jumbotron" style="background-color: #FFFFFE">

		<div class="row" style="background-color: #EBF6FA; height: 250px; margin-left: 20px; margin-right: 20px">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<center>
					<div style="margin: 5%">
						<img class="img-circle" height="200" src="<?=base_url()?>img/upload/<?php echo $profil[0]->foto ?>">	
					</div>
				</center>
				
			</div>
			<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
				<div style="height: 250px;">
					<br>
					<legend style="margin-top: 0; font-weight: bold;  font-size: 32px;"><?php echo $profil[0]->username ?></legend>
					
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="border: 1px">
							Note : <br>
							<?php if ($profil[0]->note) {
								echo $profil[0]->note;
							}else{
								echo "Tuliskan pesan anda ...";
							} ?>
						</div>
				</div>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<div style=" height: 250px">
					<br>
					<center>
						<legend style="margin-top: 0; font-weight: bold;  font-size: 32px;"><?php echo $profil[0]->poin?><sub style="font-weight: normal;">Point</sub></legend>	
					</center>
					<br>
					<table class="table table-hover">
						<tbody>
								Keahlian :
								
									<td><?php echo $profil[0]->passion_1 ?></td>
								
								<tr>
									<td><?php echo $profil[0]->passion_2 ?></td>
								</tr>
								<tr><td></td></tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="center" style="">
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="background-color: #FFFFFE; margin: 0%; ">
				<br>
				<legend style="font-size: 16px"><span class="glyphicon glyphicon-globe"></span> &nbspInfo  
				</legend>

				<div style="margin-left: 20px;font-size: 14px">

					<span class="glyphicon glyphicon-user"></span> Nama  :  <?php echo $user[0]->nama?><br>
					<span class="glyphicon glyphicon-envelope"></span> Email  :  <?php echo $user[0]->email?><br>
					<span class="glyphicon glyphicon-education"></span> Pendidikan  :  <?php echo $profil[0]->pendidikan?>
					<br><br>
				</div>

			</div>

<!-- POSTINGAN USER -->
			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="margin: 0%">
					<div style=" padding: 2%; background-color: #FFFFFE;">
						<legend style="font-size: 16px "> Postingan :  
								<div class="btn-group btn-group-justified">
									<?php $tanya=$this->db->query('select * from pertanyaan where id_user = "'.$profil[0]->username.'"');?>
								  <a id="Bertanya" href="#" class="btn btn-primary">Bertanya (<?php echo $tanya->num_rows() ?>)</a>
								  	<?php $answer=$this->db->query('select * from jawaban where id_user = "'.$profil[0]->username.'"');?>
								  <a id="Menjawab" href="#" class="btn btn-primary">Menjawab (<?php echo $answer->num_rows() ?>)</a>
								</div>
						</legend>
						
						<div id="pertanyaan">
							


						</div>	

					</div>
					<br><br>

			</div>
	</div>
	
</div>

<?php $this->load->view('header_footer/footer'); ?>