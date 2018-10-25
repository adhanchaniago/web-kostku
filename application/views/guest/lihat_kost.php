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

<div id="header_kost">



</div>

<div class="container" style="margin-top: 10px">

<!-- START KIRI ABOUT -->
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="margin-top: 15px">	
		<div class="text-center" style=";color: #fff;font-weight: 700;height: 30px; background-color: #009B4C; ">
			ADA 10 KAMAR
		</div>
		
		<div style="margin-top: 15px; margin-left: 15px;margin-right: 15px;">
			<table>
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
			</table>
			
			<br>
			<button class="btn btn-group-justified" style="background-color: #FE522A;" data-toggle="modal" data-target="#Modal_Hubungi">
				<span style="color: #FFF;font-weight: 700">HUBUNGI KOST</span>
			</button>

			<div class="text-center" style="font-weight: bold; font-size: 14px">
				Update Terakhir Pada
				<br>
				<span style="color: #27ab27;">05-10-2018</span>
				<br>
				<span style="font-size: 12px">*Data bisa berubah sewaktu-waktu</span>
			</div>


		</div>


	</div>
<!--  END KIRI ABOUT  -->


<!-- START DAfTR KAMAR -->
	<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
		<div id="daftar_kamar">
		



		</div>
		
	</div>
<!-- End Kanan Kamar -->
	
</div>


<!-- Modal -->
    <div id="Modal_Hubungi" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

		  <div class="modal-header">
           
          </div>

          <div class="modal-body">

			<center>
	            <label>Nomor :</label>
				<div class="row" style="margin-left: 50px;">
	              <img src="<?=base_url()?>assets/img/tlp.jpg" height="60" width="60">
	              <div id="no_hpp" style="margin-left: 20px; font-weight: 700; font-size: 28px;margin-top: 15px">
	              </div>
	            </div>
			</center>

          </div>
           <div class="modal-footer">
           
          </div>
        </div>

      </div>
    </div>
<!-- End MODAL ADD-->




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

<?php $this->load->view('guest/footer'); ?>