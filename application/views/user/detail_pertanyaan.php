<?php $this->load->view('header_footer/header'); ?>

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




<div style="padding-left: 5%;padding-right:  5%; padding-top: 1%">
<!-- kaanannnn -->
	<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
		<div style=" background-color: #FFFFFF">
			<div style="padding-left: 4%;padding-right: 4%;padding-top: 2%;">
				<?php
					$pro=$this->Helpmy_model->getIconUser($pertanyaan[0]->id_user);
				?>	
			<img src="<?=base_url()?>img/upload/<?php echo $pro[0]->foto ?>" width="32" height="32">&nbsp<?php echo $pertanyaan[0]->tingkatan ?>&nbsp <?php echo $pertanyaan[0]->kategori ?> - <?php echo $pertanyaan[0]->hadiah ?> poin
					
					<?php if ($this->session->userdata('logged_in')) {
						$sessData=$this->session->userdata('logged_in');
						if ($sessData['username']==$pertanyaan[0]->id_user) {?>
							
						<div class="float-right">
							<button id="answer_Edit" type="button" class="btn btn-primary btn-xs">Edit</button>
							<button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#ques_delete">Delete</button>
						</div>

				<?php	}
					} ?>

					<div style="padding-left: 5%;padding-right: 1%;padding-top: 0.5%;font-size: 24px;">
						<?php echo $pertanyaan[0]->pertanyaan ?>
					</div>
					<br><br>
					<a href="">Tanyakan detail pertanyaan</a> -
					<a href="">Ikuti</a> -
					<a href="">tidak puas? sampaikan!</a>
					dari <a style="color: black" href=""><?php echo $pertanyaan[0]->id_user ?></a>
					<br><br>
			</div>
		</div>
		<br>
		<div style=" background-color: #FFFFFF">
			<br>
			<div style="padding-left: 4%; font-size: 16px"><b>Jawaban</b></div>
			<?php if ($this->session->userdata('logged_in')) {?>
			<div style="padding: 4%; padding-top: 1%">
				<div style="background-color: #A8EDC8;height: 240px">
					<div style="padding: 2%">
<!--	fom JWB	-->		<?php echo validation_errors(); ?>
								<img class="img-circle mx-auto" src="<?=base_url()?>img/upload/<?php echo $profil[0]->foto ?>" width="32" height="32">&nbsp <?php echo $profil[0]->username ?> 
							<div style="padding-left: 3%;padding-right: 1%;padding-top: 0.5%">
								<input id="id_q" type="hidden" value="<?php echo $pertanyaan[0]->id_q ?>">
								<input id="id_hadiah" type="hidden" value="<?php echo $pertanyaan[0]->hadiah ?>">
								<input id="id_poin" type="hidden" value="<?php echo $profil[0]->poin?>">
								<textarea id="jwb" class="form-control" rows="6" placeholder="Tahu jawabannya? Tambahkan disini" required></textarea>
						<?php 
							$sessData=$this->session->userdata('logged_in');
							$cek=$this->Helpmy_model->cekjawaban($pertanyaan[0]->id_q);

							if ($sessData['username']==$pertanyaan[0]->id_user) { ?>
								<button id="btn_save" class="buttono button4 btn btn-rounded float-left" disabled><b>Jawab</b></button> Anda tidak Bisa menjawab pertanyaan sendiri !!!
						<?php }else if($cek){ ?>
								<button id="btn_save" class="buttono button4 btn btn-rounded float-left" disabled><b>Jawab</b></button> Anda tidak Bisa menjawab Lebih dari 1  !!!
						<?php }else{?>	
								<button id="btn_save" class="buttono button4 btn btn-rounded float-left"><b>Jawab</b></button>
						<?php	} ?>
							</div>
					</div>
				</div>
			</div>
			<br><br>
			<?php } ?>


<!-- Jawaban user -->
		<?php 
		foreach ($penjawab as $pjwb) { ?>
			<div style="background-color: #FFFFFF">
				<br>
				<div style="padding-left: 4%;padding-right: 4%;padding-top: 1%;">
					<?php
					$pro=$this->Helpmy_model->getIconUser($pjwb->id_user);
					?>
					<img src="<?=base_url()?>img/upload/<?php echo $pro[0]->foto ?>" width="32" height="32">&nbsp <?php echo $pjwb->id_user ?>
							
						<?php if ($this->session->userdata('logged_in')) {
								$sessData=$this->session->userdata('logged_in');
								if ($sessData['username']==$pjwb->id_user) {?>
									<div class="float-right">
										<button id="comment_Edit" type="button" class="btn btn-primary btn-xs">Edit</button>
										<a class="delete_comnt" href="<?=site_url()?>/Helpmy/deleteComment/<?php echo $this->uri->segment(3)?>/<?php echo $pjwb->id_a ?>">
										<button id="comment_delete" type="button" class="btn btn-danger btn-xs" >Delete</button>
										</a>
									</div>
						<?php	}
							} ?>
						
					<div style="padding-left: 5%;padding-right: 1%;padding-top: 0.5%;font-size: 20px;">
						<?php echo $pjwb->jawaban ?>
					</div>
					<br>
					<div style="padding-left: 5%">
						<input type="hidden" id="questionjawab" value="<?php echo $pertanyaan[0]->id_q ?>">
						<input type="hidden" id="id_jawab" value="<?php echo $pjwb->id_a ?>">
						<button id="#liked" type="button" class="btn btn-default btn-xs button_like"><b>❤ TERIMA KASIH </b></button> &nbsp
						<!-- <a href="">Komentar</a> &nbsp
						<a href="">tidak puas? sampaikan!</a> -->
					</div>
					<br>
					<div style="height: 1px;background-color: #E1E8ED"></div>
				</div>
			</div>
		<?php	}	?>

		</div>
	</div>
<!-- kaanannnn -->


<!-- Kiriiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii -->
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
		<?php if ($this->session->userdata('logged_in')){
				$lvl=$this->session->userdata('logged_in');
				if ($lvl['level']!=1) { ?>

					<div style="height: 140px; background-color: #FFFFFF">
						<div style="padding-left: 4%;padding-right: 4%;padding-top: 5%;">
							<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
									<img class="img-circle mx-auto d-block" width="96px" height= "96px" src="<?=base_url()?>img/upload/<?php echo $profil[0]->foto ?>">	
							</div>
							<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7" style="padding-top: 1%">
								<div style="font-size: 16px"><b><?php echo $profil[0]->username ?></b></div>
								Rank : noob <br>
								Poin : <?php echo $profil[0]->poin?>
							</div>
						</div>
					</div>
				<br>
		<?php }
			}	?>

		<!-- <div style="height: 353px; background-color: #FFFFFF">
			<div style="padding-left: 4%;padding-right: 4%;padding-top: 5%;">
				<legend style="font-size: 16px;"><b>Tantangan Tersedia</b></legend>
			</div>
		</div> -->
		<br>
		<div style="height: 403px; background-color: #FFFFFF">
			<div style="padding-left: 4%;padding-right: 4%;padding-top: 5%;">
				<legend style="font-size: 16px;"><b>Pengguna Tercerdas</b></legend>
				<?php
						foreach ($cerdas as $key) {?>
							<br>
							<div style="margin-top: -10px">
								<div class="row">
									<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
										<img class="img-circle" src="<?=base_url()?>img/upload/<?php echo $key->foto?>" width="38" height="38">
									</div>
									<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									 	<?php echo $key->username ?>
									</div>
									<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
									  	<b><?php echo $key->poin ?></b> poin
									</div> 
								</div>
							</div>
				<?php   } 
				 ?>
			</div>
		</div>
		<br>
		<div style="height: 143px; background-color: #FFFFFF">
			<div style="padding-left: 4%;padding-right: 4%;padding-top: 5%;">
				<h4 align="center"><b>Masih Belum Yakin</b></h4>
				<br>
				<center>
						<button type="button" class="btn btn-rounded" style="background-color: #57B2F8;color: #FFFFFF;"><b>TANYA SEKARANG</b></button>
				</center>
			</div>
		</div>
		
		<div style="height: 143px;">
			<div style="padding-left: 4%;padding-right: 4%;padding-top: 5%;">
			</div>
		</div>

	</div>
<!-- Kiriiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii -->





<!-- Modal  Jawab -->
   <div class="modal fade" id="modal_jwb" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                
				<div class="modal-body">
					<div class="container">
						Periksa kembali jawaban Anda, Yakin Untuk Tetap Melanjutkan ?
					</div>
				<?php echo form_open('/Helpmy/newjawaban/'.$this->uri->segment(3));?>

						<input type="hidden" id="id_q_t" type="text" name="id_q">
						<input type="hidden" id="id_hadiah_t" type="text" name="hadiah">
						<input type="hidden" id="id_poin_t" type="text" name="poin">

						<textarea hidden="" id="jwb_t" class="form-control" name="jawab" rows="6"></textarea>

			          <div class="form-group row container">
					  		<center>
					  			<button class="btn btn-danger" data-dismiss="modal" style="color: #FFFFFF;"><b>Kembali</b></button>
				    			<button type="submit" class="btn btn-success" style="color: #FFFFFF;"><b>Ya</b></button>
				    		</center>
					  </div>
			    <?php echo form_close(); ?>	
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

</div>


   

<?php $this->load->view('header_footer/footer'); ?>