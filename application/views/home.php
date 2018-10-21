<?php $this->load->view('header_footer/header_home'); 
	$rows=1;
	
	function get_time_ago( $time )
	{
	    $time_difference = (time() + 60 * 60 * 5) - $time;

	    if( $time_difference < 1 ) { return 'less than 1 second ago'; }
	    $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
	                30 * 24 * 60 * 60       =>  'month',
	                24 * 60 * 60            =>  'day',
	                60 * 60                 =>  'hour',
	                60                      =>  'minute',
	                1                       =>  'second'
	    );

	    foreach( $condition as $secs => $str )
	    {
	        $d = $time_difference / $secs;

	        if( $d >= 1 )
	        {
	            $t = round( $d );
	            return $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
	        }
	    }
	}
?>

<br>
		
<div class="container">
	
	<div style=" size: 40px">
		<center>
		<legend><strong>Rekomendasi Dari Mykost</strong></legend> 
		</center>
	</div>
	<div class="row">
		
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 ">
			<div class="card">
				<div class="text-center" style="background-color: #27AB27;color: #fff;font-weight: 700">ADA 10 KAMAR</div>
				<img class="img-responsive" src="<?=base_url()?>img/m/k1.jpg"></tr>
				<div style="color: #3e5168;font-weight: 700; font-size: 16px;">Kost Kembang Turi No 26 Malang</div>
				<br><br><br>
				<button class="btn-group-justified">Hubungi Kost Ini</button>
			</div>
		</div>

		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 ">
			<div class="card">
				<div class="text-center" style="background-color: #27AB27;color: #fff;font-weight: 700">ADA 10 KAMAR</div>
				<img class="img-responsive" src="<?=base_url()?>img/m/k1.jpg"></tr>
				<div style="font-weight: 700; font-size: 16px;">
				<a href="" style="color: #3e5168;">Kost Kembang Turi No 26 Malang</a></div>
				<br><br><br>
				<button class="btn btn-group-justified">Hubungi Kost Ini</button>
			</div>
		</div>

	</div>




<!-- Lebih Banyakkkkkkkkk -->
<br><br>

<center>
	<button type="button" class="btn" style="color: #2d2d2d;font-weight: 600;font-size: 18px;">Lihat Lebih Banyak Lagi +</button>
</center>


<br><br>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align: center;">
	<span style="font-size: 25px;">Anda Pemilik Kosan ?</span>
	<br>
	<span style="font-size: 18px">Promosikan kost anda di Mamikos.com agar lebih dikenal.</span>
</div>






<?php $this->load->view('header_footer/footer'); ?>