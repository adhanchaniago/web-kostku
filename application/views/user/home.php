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
</style>

<div class="container-fluid">
	


		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			<div class="card">
				<img class="img-responsive" src="<?=base_url()?>img/m/k1.jpg"></tr>
				<div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="background-color: #27AB27">
						<div class="text-center" style=";color: #fff;font-weight: 700;font-size:1vw; ">ADA 10 KAMAR</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<span style="font-size:1vw;color: #27AB27;font-weight: 700">Rp. 800rb/bln</span>
					</div>
					
				</div>
				
				<div style="font-weight: 700; font-size: 16px;">
				<a href="" style="color: #3e5168;font-size: 1vw">Kost Kembang Turi No 26 Malang</a></div>
				<br><br><br>
				<button class="btn btn-group-justified" style="font-size: 1vw">Hubungi Kost Ini</button>
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