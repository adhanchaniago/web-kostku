<?php $this->load->view('header_footer/header'); 
		$sessData=$this->session->userdata('logged_in');
?>

<div class="container">
	<div class="jumbotron" style="background-color: #FFFFFE">
		<?php echo form_open_multipart('helpmy/profil_update');?>
			<legend>Edit Profil</legend>
		<?php echo validation_errors(); ?>
		<div class="flex-row">
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				
				<img class="img-rounded" height="200" src="<?=base_url()?>img/upload/<?php echo $profil[0]->foto ?>">
				<br>
				<input type="text" class="form-control" name="fotolama" value="<?php echo $profil[0]->foto ?>" readonly>
				<input type="file" class="form-control" name="fotobaru">
				<br><br>
				
			</div>
			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
				<label for="">Nama Lengkap</label>
				<input type="text" name="nama" class="form-control" id="nama" value="<?php echo $user[0]->nama ?>" required>
				<label>Email</label>
				<input type="text" name="email" class="form-control" id="email" value="<?php echo $user[0]->email ?>">
				<label>Pendidikan</label>
				<input type="text" name="pendidikan" class="form-control" id="pendidikan" value="<?php echo $profil[0]->pendidikan ?>">
				<label>Passion 1 :</label>
				<select class="form-control form-control-lg" name="passion_1" >
				        <?php 
						foreach ($mapel as $key) {		
							if ($key->kategori==$profil[0]->passion_1) { 
						?>
								<option selected><?php echo $profil[0]->passion_1?></option>
						<?php }else{	?>
								<option><?php echo $key->kategori?></option>
						<?php } 
						} ?>
				</select>
				<label>Passion 2 :</label>
				<select class="form-control form-control-lg" name="passion_2" >
				        <?php 
						foreach ($mapel as $key) {		
							if ($key->kategori==$profil[0]->passion_2) { 
						?>
								<option selected><?php echo $profil[0]->passion_2?></option>
						<?php }else{	?>
								<option><?php echo $key->kategori?></option>
						<?php } 
						} ?>
				</select>
				<label>Note</label>
				<textarea class="form-control" rows="3" name="note"><?php echo $profil[0]->note ?></textarea>
			</div>

			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
		  &nbsp
		<?php echo form_close(); ?>	
	</div>
	
</div>

<?php $this->load->view('header_footer/footer'); ?>