<?php $this->load->view('user/header_u'); ?>

<div class="container">
	<?php echo form_open_multipart('wisata/create');?>
		<legend>Tambah Data Wisata</legend>
	<?php echo validation_errors(); ?>
		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">		
			<div>
				<label for="">Nama</label>
				<input type="text" name="nama" class="form-control" id="nama" placeholder="field Nama">
				<label>Tempat</label>
				<input type="text" name="tempat" class="form-control" id="tempat" placeholder="field Tempat">
				<label>Provinsi</label>
				<input type="text" name="provinsi" class="form-control" id="provinsi" placeholder="field Provinsi">
				<label>Keterangan</label>
				<textarea class="form-control" rows="6" name="keterangan"></textarea>
				<input type="hidden" name="key" value="insert">  
		    </div>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<div class="container-fluid">
				<img src="<?=base_url()?>img/noimage.png" class="img-fluid" alt="...">
				<br>
				<input type="file" class="form-control" id="img_file" name="img_file">
			</div>
		</div>
		<br><br>
		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
			<center>
				<button type="submit" class="btn btn-primary">Submit</button>	
			</center>
		</div>	    
	<?php echo form_close(); ?>	

</div>
	
<?php $this->load->view('footer'); ?>