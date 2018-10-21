<?php $this->load->view('header_footer/header_home'); 
	$rows=1;
	
?>

<br>
		
<div class="container">
	
	<div style=" size: 40px">
		<center>
		<legend><strong>Rekomendasi Dari Mykost</strong></legend> 
		</center>
	</div>
	<div class="row">
		
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<div class="card">
				<img class="img-responsive" src="<?=base_url()?>img/m/k1.jpg"></tr>
				<div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="background-color: #27AB27">
						<div class="text-center" style=";color: #fff;font-weight: 700; ">ADA 10 KAMAR</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<span style="color: #27AB27;font-weight: 700">Rp. 800rb/bln</span>
					</div>	
				</div>
				
				<div >
					<button class="tagputri btn">Putri</button>
				</div>

				<div style="font-weight: 700; font-size: 18px; margin-top: 5px ">
				<a href="" style="color: #3e5168;">Kost Kembang Turi No 26 Malang</a></div>
				<br><br><br>
				<a style="text-decoration: none; color: #2d2d2d;" href="<?php echo site_url('/Kostku/lihat_kost')?>">
					<button class="btn btn-group-justified">Hubungi Kost Ini</button>
				</a>
			</div>
		</div>


		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<div class="card">
				<img class="img-responsive" src="<?=base_url()?>img/m/k1.jpg"></tr>
				<div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="background-color: #27AB27">
						<div class="text-center" style=";color: #fff;font-weight: 700; ">ADA 10 KAMAR</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<span style="color: #27AB27;font-weight: 700">Rp. 800rb/bln</span>
					</div>	
				</div>
				
				<div>
					<button class="btn tagputra">Putra</button>
				</div>

				<div style="font-weight: 700; font-size: 18px; margin-top: 5px ">
				<a href="" style="color: #3e5168;">Kost Kembang Turi No 26 Malang</a></div>
				<br><br><br>
				<button class="btn btn-group-justified" style="">Hubungi Kost Ini</button>
			</div>
		</div>


		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<div class="card">
				<img class="img-responsive" src="<?=base_url()?>img/m/k1.jpg"></tr>
				<div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="background-color: #27AB27">
						<div class="text-center" style=";color: #fff;font-weight: 700; ">ADA 10 KAMAR</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<span style="color: #27AB27;font-weight: 700">Rp. 800rb/bln</span>
					</div>	
				</div>
				
				<div>
					<button class="btn tagcampur">Campur</button>
				</div>

				<div style="font-weight: 700; font-size: 18px; margin-top: 5px ">
				<a href="" style="color: #3e5168;">Kost Kembang Turi No 26 Malang</a></div>
				<br><br><br>
				<button class="btn btn-group-justified" style="">Hubungi Kost Ini</button>
			</div>
		</div>


	</div>




<!-- Lebih Banyakkkkkkkkk -->
<br><br>

<center>
	<a href="<?php echo site_url('/Kostku/home_guest')?>">
	<button type="button" class="btn" style="color: #2d2d2d;font-weight: 600;font-size: 18px;">Lihat Lebih Banyak Lagi +</button></a>
</center>


<br><br>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align: center;">
	<span style="font-size: 25px;">Anda Pemilik Kosan ?</span>
	<br>
	<span style="font-size: 18px">Promosikan kost anda di Mamikos.com agar lebih dikenal.</span>
</div>






<?php $this->load->view('header_footer/footer'); ?>