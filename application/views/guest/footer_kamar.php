		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<script type="<?=base_url()?>assets/js/jquery-3.3.1.min.js"></script>
		<script type="<?=base_url()?>assets/js/bootstrap.min.js"></script>

	<script type="text/javascript">
	$(document).ready(function(){

        info_detai_kamar(); //show detail kamar

        var flag = false;


		function info_detai_kamar(){
                	 $.ajax({
			                type  : 'ajax',
			                url   : '<?php echo site_url('Kostku/get_info_kamar_by/').$this->uri->segment(3)?>',
			                async : false,
			                dataType : 'json',
			                success : function(data){
			                    var html = '';
			                    html += 
			                    		'<section style="background-image: url(<?=base_url()?>assets/img_kamar/'+data[0].foto_kamar+'); background-size: cover; background-repeat: no-repeat; background-position: center; height: 100% ">'+
										      '<div style="height: 300px;"></div>'+
										'</section>';
			                    $('#poster').html(html);

			                    var html = '';
			                    html += 
			                    		'<div style="font-weight: 700; font-size: 28px; margin-top: 5px; ">'+
											data[0].nama+
										'</div>'+
										'<div style="font-weight: 700; font-size: 14px; color: #27AB43">'+
											data[0].kota+', '+data[0].propinsi+'<span class="taglokasi btn">&nbsp<span class="glyphicon glyphicon-map-marker"></span>&nbspLihat Lokasi&nbsp</span>'+
										'</div>';
			                    $('#header_nama').html(html);

			                }
			            });
		        }
 
    });
	</script>

</body>
</html>