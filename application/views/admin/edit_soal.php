<?php $this->load->view('header_footer/header_admin');?>

<div class="container">
    <div id="mainn">

		<div style=" background-color: #FFFFFF">
			<div style="padding-left: 4%;padding-right: 4%;padding-top: 2%;">
				<?php
					$pro=$this->Helpmy_model->getIconUser($pertanyaan[0]->id_user);
				?>	
			<img src="<?=base_url()?>img/upload/<?php echo $pro[0]->foto ?>" width="32" height="32">&nbsp<?php echo $pertanyaan[0]->tingkatan ?>&nbsp <?php echo $pertanyaan[0]->kategori ?> - <?php echo $pertanyaan[0]->hadiah ?> poin
					
						<div class="float-right">
							<button id="answer_Edit" type="button" class="btn btn-primary btn-xs">Edit</button>
							<button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#ques_delete">Delete</button>
						</div>

					<div style="padding-left: 5%;padding-right: 1%;padding-top: 0.5%;font-size: 24px;">
						<?php echo $pertanyaan[0]->pertanyaan ?>
					</div>
					<br><br>
					<a href="">Tanyakan detail pertanyaan</a>
					dari <a style="color: black" href=""><?php echo $pertanyaan[0]->id_user ?></a>
					<br><br>
			</div>
		</div>

	</div>
</div>

<!-- Modal  del quest-->
   <div class="modal fade" id="ques_delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

<!-- Modal editQusetion -->
   <div class="modal fade" id="editQusetion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
      		<?php echo form_open('/Helpmy/updatePertanyaan/'.$this->uri->segment(3));?>
				<div class="modal-body">
					<div class="form-group">
			          	<button type="button" class="close" data-dismiss="modal">&times;</button>
			          	<br>
			            <label for="message-text" class="col-form-label">Pertanyaan Mu</label>
			            <textarea class="form-control" name="soal" rows="6"><?php echo $pertanyaan[0]->pertanyaan ?></textarea>
			         </div>
			         <br>
			         <div class="form-group row">
			          	<div class="col-xs-3">

			          		<select class="form-control form-control-lg" name="mapel">
						        <?php foreach ($this->Helpmy_model->getmapel() as $key) {	
						        		if ($pertanyaan[0]->kategori==$key->kategori) { 		?>
						        			<option selected><?php echo $key->kategori?></option>
						        <?php		}else{	?>
											<option><?php echo $key->kategori?></option>
								<?php 		}
										}  ?>
							</select>
			          	</div>
			          	<div class="col-xs-4">
			          		<select class="form-control form-control-lg" name="tingkatan">
			          			<option selected><?php echo $pertanyaan[0]->tingkatan; ?></option>
						        <option>Umum</option>
						        <option>Sekolah Dasar</option>
						        <option>Sekolah Menegah Pertama</option>
						        <option>Sekolah Menegah Atas</option>
							</select>
			          	</div>
			          	<div class="col-sm-2">
							<input class="form-control form-control-lg" type="text" name="poin" value="<?php $pertanyaan[0]->hadiah ?>" required>
							<input type="hidden" name="dari" value="admin">
			          	</div>
			          	<span class="glyphicon glyphicon-question-sign"></span> &nbsp Poin
			         </div>
			         <div class="form-group align-content-center">
			         		<button class="btn btn-danger" data-dismiss="modal">Batal</button>
			         		<button type="submit" class="btn btn-success">Update</button>
			         </div>
				</div>
			 <?php echo form_close(); ?>	 
            </div>
        </div>
    </div> 

<?php $this->load->view('header_footer/footer_admin');?>