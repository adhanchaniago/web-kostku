<?php $this->load->view('header_footer/header_admin');?>

<div class="container">
	 		
		<div style=" background-color: #FFFFFF">
			<div style="padding-left: 4%;padding-right: 4%;padding-top: 2%;">
				<?php
					$pro=$this->Helpmy_model->getIconUser($jwbn[0]->id_penanya);
				?>	
			<img src="<?=base_url()?>img/upload/<?php echo $pro[0]->foto ?>" width="32" height="32">&nbsp<?php echo $jwbn[0]->tingkatan ?>&nbsp <?php echo $jwbn[0]->kategori ?> - <?php echo $jwbn[0]->hadiah ?> poin
					

					<div style="padding-left: 5%;padding-right: 1%;padding-top: 0.5%;font-size: 24px;">
						<?php echo $jwbn[0]->pertanyaan ?>
					</div>
					<br><br>
					<a href="">Tanyakan detail pertanyaan</a> -
					<a href="">Ikuti</a> -
					<a href="">tidak puas? sampaikan!</a>
					dari <a style="color: black" href=""><?php echo $jwbn[0]->id_penanya ?></a>
					<br><br>
			</div>
		</div>
<!-- jawaban -->
<br>
	 		<div style="background-color: #FFFFFF">
	 			<br>
	 			<div style="padding-left: 4%; font-size: 16px"><b>Jawaban</b></div>
				<br>
				<div style="padding-left: 4%;padding-right: 4%;padding-top: 1%;">
					<?php
					$pro=$this->Helpmy_model->getIconUser($jwbn[0]->id_penjawab);
					?>
					<img src="<?=base_url()?>img/upload/<?php echo $pro[0]->foto ?>" width="32" height="32">&nbsp <?php echo $jwbn[0]->id_penjawab ?>
							
					<div class="float-right">
						<button  data-toggle="modal" data-target="#ques_Update" class="btn btn-primary btn-xs">Edit</button>
										
						<button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#ques_delete">Delete</button>
				
					</div>
						
					<div style="padding-left: 5%;padding-right: 1%;padding-top: 0.5%;font-size: 20px;">
						<?php echo $jwbn[0]->jawaban ?>
					</div>
					<br>
					<div style="padding-left: 5%">
						<button type="button" class="btn btn-default btn-xs button_like"><b>❤ TERIMA KASIH </b></button> &nbsp
						<a href="">Komentar</a> &nbsp
						<a href="">tidak puas? sampaikan!</a>
					</div>
					<br>
					<div style="height: 1px;background-color: #E1E8ED"></div>
				</div>
			</div>
</div> 


<!-- Modal  del quest-->
   <div class="modal fade" id="ques_delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
				<div class="modal-body">
					<div class="container">
						JAWABAN INI anda akan di HAPUS, Yakin Untuk Tetap Melanjutkan ?
					</div>
			        <div class="form-group row container">
						<center>
					  		<button class="btn btn-danger" data-dismiss="modal" style="color: #FFFFFF;"><b>Kembali</b></button>
					  		<input type="hidden" name="dari" value="admin">
				    		<a class="delete_comnt" href="<?=site_url()?>/Admin/DelJawaban/<?php echo $jwbn[0]->id_a ?>">
				    			<button type="submit" class="btn btn-success" style="color: #FFFFFF;"><b>Ya</b></button>
				    		</a>
				    	</center>
					</div>
				</div>
            </div>
        </div>
    </div>

<!-- Modal editQusetion -->
   <div class="modal fade" id="ques_Update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
      		<?php echo form_open('/Admin/updateJawaban/'.$this->uri->segment(3));?>
				<div class="modal-body">
					<div class="form-group">
			          	<button type="button" class="close" data-dismiss="modal">&times;</button>
			          	<br>
			            <label for="message-text" class="col-form-label">Pertanyaan Mu</label>
			            <textarea class="form-control" name="jawaban" rows="6"><?php echo $jwbn[0]->jawaban ?></textarea>
			         </div>
			         <br>
			         
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