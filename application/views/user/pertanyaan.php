<!-- Jawaban user -->
		<?php 
		foreach ($tanya as $tnya) { ?>
			<div style="background-color: #FFFFFF">
				<br>
				<div style="padding-left: 4%;padding-right: 4%;padding-top: 1%;">
					<?php
					$pro=$this->Helpmy_model->getIconUser($tnya->id_user);
					?>

					<div class="row">
						<img src="<?=base_url()?>img/upload/<?php echo $profil[0]->foto ?>" width="32" height="32">&nbsp 
						<div style="margin-left: 2%">
							<b><?php echo $tnya->id_user ?></b> <br>
							<?php echo $tnya->tanggal ?>
						</div>
					</div>
					
					<div style="padding-left: 5%;padding-right: 1%;padding-top: 0.5%;font-size: 18px;">
						<a style="color: black" href="<?=site_url()?>/Helpmy/detailpertanyaan/<?php echo $tnya->id_q?>">	
							<?php echo $tnya->pertanyaan ?>
						</a>
					</div>
					<br>
					<div style="padding-left: 5%">
						<button type="button" class="btn btn-default btn-xs button_like"><b>❤ TERIMA KASIH </b></button> &nbsp
						<a href="">Komentar (0)</a> &nbsp
					</div>
					<br>
					<div style="height: 1px;background-color: #E1E8ED"></div>
				</div>
			</div>
		<?php	}	?>
		<br><br>


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
						        <?php foreach ($mapel as $key) {	
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
			          		<select class="form-control form-control-lg" name="poin" >
						        <?php for ($i=1; $i < $profil[0]->poin; $i++) { 
						        	if ($i%5==0) {  
						        		if ($pertanyaan[0]->hadiah==$i) { ?>
						        				<option selected><?php echo $i; ?></option>
						        <?php			}else{ ?>
						        				<option><?php echo $i; ?></option>
						        <?php			}		
						        		}	
						         	} ?>
							</select>
			          	</div>
			          	<span class="glyphicon glyphicon-question-sign"></span> &nbspAnda memiliki <?php echo $profil[0]->poin; ?> Poin
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
