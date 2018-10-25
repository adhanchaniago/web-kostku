<?php 

$this->load->view('header_footer/header'); 

	if ($this->session->userdata('logged_in')) {
			$lvl=$this->session->userdata('logged_in');
			if ($lvl['level']==1) {
				$this->load->view('header_footer/header_admin'); 
			}else{
				$this->load->view('header_footer/header'); 
			}
			
		}
?>


<style>
table {
    border-collapse: collapse;
    border: 1px solid #ddd;
     width: 100%;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

tr:hover {background-color:#f5f5f5;}
</style>


	<section style="background-image: url('<?=base_url()?>img/upload_kamar/c89BU9Hk-540x720.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center; height: 100% ">
	      <!-- Put anything you want here! There is just a spacer below for demo purposes! -->
	      <div style="height: 300px;">
	      	
	      </div>
	</section>


<div class="container" style="margin-top: 10px">

	<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
		
		<div style="font-weight: 700; font-size: 28px; margin-top: 5px; ">
			Kost Kembang Turi No 26 Malang
		</div>
		<div style="font-weight: 700; font-size: 14px; color: #27AB43">
			Klojen, Malang <span class="taglokasi btn">&nbsp<span class="glyphicon glyphicon-map-marker"></span>&nbspLihat Lokasi&nbsp</span>
		</div>

<br>
<!-- STARTT FASILITASSSS -->
		<!-- Fasilitas Kamar -->
		<div class="row" style="border-bottom: 1px solid #ddd; margin-top: 10px;">
			<div class="col-lg-3 col-md-3 col-xs-12">
				<strong style="font-size: 14px;font-weight: bold;">Fasilitas Kamar</strong>
			</div>

			<div class="col-lg-9 col-md-9 col-xs-12">
				<div id="f_kamar">
					
				</div>

				<div class="col-lg-4 col-md-6 col-sm-4 col-xs-12">
					<div class="row">
						<img class="img-fluid" style="height: 30px;margin-right: 10px;" src="https://mamikos.com/uploads/tags/efKlNbEw.png" alt="Kamar Mandi Luar"">
						<span style="font-size: 14px;">Kamar Mandi Luar"</span>
					</div>
				</div>
			</div>
			<div style="height: 50px"></div>
		</div>
		<!-- END Fasilitas Kamar -->

		<!-- LUAS KAMAR -->
		<div class="row"  style="border-bottom: 1px solid #ddd; margin-top: 10px;">
			<div class="col-lg-3 col-md-3 col-xs-12">
				<strong style="font-size: 14px;font-weight: bold;">Luas Kamar</strong>
			</div>

			<div class="col-lg-9 col-md-9 col-xs-12">
				
				<div class="col-lg-4 col-md-6 col-sm-4 col-xs-12">
					<div class="row">
						<span style="font-size: 14px;" > 3x3</span>
					</div>
				</div>
			</div>
			<div style="height: 40px"></div>
		</div>
		<!-- END LUAS KAMAR -->

		<!-- KAMAR MANDI -->
		<div class="row" style="border-bottom: 1px solid #ddd; margin-top: 10px;">
			<div class="col-lg-3 col-md-3 col-xs-12">
				<strong style="font-size: 14px;font-weight: bold;">Kamar Mandi</strong>
			</div>

			<div class="col-lg-9 col-md-9 col-xs-12">
				
				<div class="col-lg-4 col-md-6 col-sm-4 col-xs-12">
					<div class="row">
						<img class="img-fluid" style="height: 30px;margin-right: 10px;" src="https://mamikos.com/uploads/tags/r5PJur0V.png" alt="Kloset Duduk">
						<span style="font-size: 14px;" >Kloset Duduk</span>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 col-sm-4 col-xs-12">
					<div class="row">
						<img class="img-fluid" style="height: 30px;margin-right: 10px;" src="https://mamikos.com/uploads/tags/efKlNbEw.png" alt="Kamar Mandi Luar"">
						<span style="font-size: 14px;">Kamar Mandi Luar"</span>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 col-sm-4 col-xs-12">
					<div class="row">
						<img class="img-fluid" style="height: 30px;margin-right: 10px;" src="https://mamikos.com/uploads/tags/efKlNbEw.png" alt="Kamar Mandi Luar"">
						<span style="font-size: 14px;">Kamar Mandi Luar"</span>
					</div>
				</div>
			</div>
			<div style="height: 50px"></div>
		</div>
		<!-- END KAMAR MANDI -->

		<!-- FASILITAS UMUM -->
		<div class="row"  style="border-bottom: 1px solid #ddd; margin-top: 10px;">
			<div class="col-lg-3 col-md-3 col-xs-12">
				<strong style="font-size: 14px;font-weight: bold;">Fasilitas Umum</strong>
			</div>

			<div class="col-lg-9 col-md-9 col-xs-12">
				
				<div class="col-lg-4 col-md-6 col-sm-4 col-xs-12">
					<div class="row">
						<img class="img-fluid" style="height: 30px;margin-right: 10px;" src="https://mamikos.com/uploads/tags/2uIBfAtw.png" alt="Kloset Duduk">
						<span style="font-size: 14px;" > Akses 24 Jam</span>
					</div>
				</div>
			</div>
			<div style="height: 40px"></div>
		</div>
		<!-- FASILITAS UMUM -->

		<!-- FASILITAS Parkir -->
		<div class="row" style="border-bottom: 1px solid #ddd; margin-top: 10px;">
			<div class="col-lg-3 col-md-3 col-xs-12">
				<strong style="font-size: 14px;font-weight: bold;">Fasilitas Parkir</strong>
			</div>

			<div class="col-lg-9 col-md-9 col-xs-12">
				
				<div class="col-lg-4 col-md-6 col-sm-4 col-xs-12">
					<div class="row">
						<img class="img-fluid" style="height: 30px;margin-right: 10px;" src="https://mamikos.com/uploads/tags/2uIBfAtw.png" alt="Kloset Duduk">
						<span style="font-size: 14px;" >Kloset Duduk</span>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 col-sm-4 col-xs-12">
					<div class="row">
						<img class="img-fluid" style="height: 30px;margin-right: 10px;" src="https://mamikos.com/uploads/tags/efKlNbEw.png" alt="Kamar Mandi Luar"">
						<span style="font-size: 14px;">Kamar Mandi Luar"</span>
					</div>
				</div>

			</div>
			<div style="height: 50px"></div>
		</div>
		<!-- FASILITAS Parkir  -->

	</div>

	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		
		<div class="text-center" style=";color: #fff;font-weight: 700;height: 30px; background-color: #009B4C; ">
			ADA 10 KAMAR
		</div>
		
		<br>
		<div style="margin-left: 15px;margin-right: 15px;">
			<table>
			  <tr>
			    <td>Rp 150,000</td>
			    <td>/ hari</td>
			  </tr>
			  <tr>
			    <td>Rp 650,000</td>
			    <td>/ Minggu</td>
			  </tr>
			  <tr>
			    <td>Rp 1.250,000</td>
			    <td>/ Bulan</td>
			  </tr>
			</table>

			<table style="font-weight: bold;">
				<tr>
					<td>Tidak Termasuk Biaya Listrik</td>		
				</tr>
				<tr>
					<td>Nomor Telepon : <a href="">Lihat Nomor Telepon</a></td>
				</tr>
			</table>
			
			<br>
			<button class="btn btn-group-justified" style="background-color: #FE522A;">
				<span style="color: #FFF;font-weight: 700">HUBUNGI KOST</span>
			</button>

			<div class="text-center" style="font-weight: bold; font-size: 14px">
				<br>
				Update Terakhir Pada
				<br>
				<span style="color: #27ab27;">05-10-2018</span>
				<br>
				<span style="font-size: 12px">*Data bisa berubah sewaktu-waktu</span>
			</div>

		</div>


	</div>
	
</div>





   <script type="text/javascript">

        $(document).ready(function(){

                $.ajax({
                    type : "POST",
                    url  : "<?php echo site_url('/helpmy/iconUser')?>",
                    dataType : "JSON",
                    data : {kode: kode},
                    cache:false,
                    success: function(data){
                    	
                         
                    }
                });
 
        });
    </script>

<?php $this->load->view('header_footer/footer'); ?>