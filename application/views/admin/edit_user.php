<?php $this->load->view('header_footer/header_admin');?>


<div class="container-fluid" style="padding-left: 8%;padding-right:  8%; padding-top: 1%">

		<div class="float-right" style="margin-right: 2%;margin-top: 1%">
			<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#user_Edit">Edit</button>
			
			
		</div>

	<div class="jumbotron" style="background-color: #FFFFFE">
		<div class="row" style="background-color: #EBF6FA;  margin-left: 20px; margin-right: 20px">
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
		<br>
		
		<div class="center" style="background-color: #EBF6FA;  margin-left: 20px; margin-right: 20px">
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="background-color: #FFFFFE; margin: 0%; ">
					<br>
					<legend style="font-size: 16px"><span class="glyphicon glyphicon-globe"></span> &nbspInfo  
					</legend>

					<div style="margin-left: 20px;font-size: 14px">

						<span class="glyphicon glyphicon-user"></span> Nama  :  <?php echo $profil[0]->nama?><br>
						<span class="glyphicon glyphicon-envelope"></span> Email  :  <?php echo $profil[0]->email?><br>
						<span class="glyphicon glyphicon-education"></span> Pendidikan  :  <?php echo $profil[0]->pendidikan?>
						<br><br>
					</div>

				</div>

	<!-- POSTINGAN profil -->
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
</div>


<!-- Modal  del quest-->
   <div class="modal fade" id="user_delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <?php echo form_open('/Helpmy/Delsoal/'.$this->uri->segment(3));?>
				<div class="modal-body">
					<div class="container">
						Soal anda akan di HAPUS, Yakin Untuk Tetap Melanjutkan ?
					</div>
			        <div class="form-group row container">
						<center>
					  		<button class="btn btn-danger" data-dismiss="modal" style="color: #FFFFFF;"><b>Kembali</b></button>
					  		<input type="hidden" name="dari" value="admin">
				    		<button type="submit" class="btn btn-success" style="color: #FFFFFF;"><b>Ya</b></button>
				    	</center>
					</div>
				</div>
				<?php echo form_close(); ?>	
            </div>
        </div>
    </div>

<!-- Modal user_Edit -->
   <div class="modal fade" id="user_Edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
      		
		      	<?php echo form_open_multipart('helpmy/profil_update');?>
		      		<br>
					<legend align="center">Edit Profil</legend>
				<?php echo validation_errors(); ?>
				<div class="flex-row">
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<input type="hidden" name="fotolama" value="<?php echo $profil[0]->foto ?>">
						<img class="img-rounded" height="200" src="<?=base_url()?>img/upload/<?php echo $profil[0]->foto ?>">
						<br>
						<input type="file" class="form-control" name="fotobaru">
						<br><br>
						
					</div>
					<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
						<label for="">Nama Lengkap</label>
						<input type="text" name="nama" class="form-control" id="nama" value="<?php echo $profil[0]->nama ?>" required>
						<label>Email</label>
						<input type="text" name="email" class="form-control" id="email" value="<?php echo $profil[0]->email ?>">
						<label>Pendidikan</label>
						<input type="text" name="pendidikan" class="form-control" id="pendidikan" value="<?php echo $profil[0]->pendidikan ?>">
						<label>Passion 1 :</label>
						<select class="form-control form-control-lg" name="passion_1" >
						        <?php 
								foreach ($this->Helpmy_model->getmapel() as $key) {		
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
								foreach ($this->Helpmy_model->getmapel() as $key) {		
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

					<button type="submit" class="btn btn-primary" style="margin-left: 8%">Submit</button>
				</div>
				  &nbsp
				<?php echo form_close(); ?>	

            </div>
        </div>
    </div> 


<?php $this->load->view('header_footer/footer_admin');?>