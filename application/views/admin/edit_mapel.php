<?php $this->load->view('header_footer/header_admin');?>

<div class="container">
	 <div class="jumbotron" style="background-color: #FFFFFE;height: 400px " >
		<?php echo form_open_multipart('Admin/mapel_update');?>
			<legend>Edit Mapel</legend>
		<div class="flex-row">
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<input type="hidden" name="fotolama" value="<?php echo $mapel[0]->icon ?>">
				<input type="hidden" name="id" value="<?php echo $mapel[0]->id ?>">
				
				<img class="img-rounded" height="200" src="<?=base_url()?>img/mapel/<?php echo $mapel[0]->icon ?>">
				<br>
				<input type="file" class="form-control" name="fotobaru">
				<br><br>
				
			</div>
			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
				<label for="">Mata Pelajaran</label>
				<input type="text" name="mapel" class="form-control" value="<?php echo $mapel[0]->kategori ?>" required>
				<label>Priority</label>
				<select class="form-control form-control-lg" name="Priority" >
				        <?php 
						for ($i=1; $i < 50; $i++) { 		
							if ($i==$mapel[0]->priority ) { 
						?>
								<option selected><?php echo $mapel[0]->priority ?></option>
						<?php }else{	?>
								<option><?php echo $i?></option>
						<?php } 
						} ?>
				</select>
			</div>
			
		</div>
	</div>
		<div class="col-md-offset-6 col-5">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>				
		<?php echo form_close(); ?>	
</div> 

<?php $this->load->view('header_footer/footer_admin');?>