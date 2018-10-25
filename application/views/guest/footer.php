		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<script type="<?=base_url()?>assets/js/jquery-3.3.1.min.js"></script>
		<script type="<?=base_url()?>assets/js/bootstrap.min.js"></script>

	<script type="text/javascript">
	$(document).ready(function(){

        show_kamar();
        info_kost(); //call function show all product
        // $('#mydata').dataTable();
        var flag = false;

        function show_kamar(){
                	 $.ajax({
			                type  : 'ajax',
			                url   : '<?php echo site_url('Kostku/get_kost_by/').$this->uri->segment(3)?>',
			                async : false,
			                dataType : 'json',
			                success : function(data){
			                    var html = '';
			                    var i;
			                    for(i=0; i<data.length; i++){
			                    	 html += 
			                    	 		'<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="margin-top: 20px">'+
												'<div class="card">'+
													'<img class="img-responsive" src="<?=base_url()?>assets/img_kamar/'+data[i].foto_kamar+'">'+
													'<div>'+
														'<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="background-color: #27AB27">'+
															'<div class="text-center" style=";color: #fff;font-weight: 700; ">Rp. '+data[i].harga+' / bln</div>'+
														'</div>'+	
													'</div>';
									html += 
											'<div style="font-weight: 700; font-size: 18px; margin-left: 10px; margin-top: 5px ">'+
														'<p style="color: #3e5168;">Ukuran '+data[i].ukuran+'</p>'+
													'</div>'+
													'<br><br>'+
													'<a style="text-decoration: none; color: #2d2d2d;" href="<?php echo site_url('/Kostku/detail_kamar/')?>'+data[i].id_kamar+'">'+
														'<button class="btn btn-group-justified">Lihat Kamar</button>'+
													'</a>'+
												'</div>'+
											'</div>';
			                    }
			                    $('#daftar_kamar').html(html);
			                }
			            });
		        }
		////////////////////  END FUngsi shof kamar ///////////////////////////////////

		function info_kost(){
                	 $.ajax({
			                type  : 'ajax',
			                url   : '<?php echo site_url('Kostku/get_info_kost_by/').$this->uri->segment(3)?>',
			                async : false,
			                dataType : 'json',
			                success : function(data){
			                    var html = '';
			                    var i;
			                    for(i=0; i<data.length; i++){
			                
			                	html += 
			                	'<section style="background-image: url(<?=base_url()?>assets/img_kost/'+data[i].foto_kost+'); background-size: cover; background-repeat: no-repeat; background-position: center; height: 100% ">'+
								      '<div style="height: 250px;">'+
								      	'<div class="container">'+
								      		'<div style="padding-top: 140px">';

								      		if (data[i].Kelamin=="Putri") {
												html +='<span class="tagputri btn ">'+data[i].Kelamin+'</span>';
											}else if(data[i].Kelamin=="Putra"){
												html +='<span class="tagputra btn">'+data[i].Kelamin+'</span>';
											}else{
												html +='<span class="tagcampur btn">'+data[i].Kelamin+'</span>';
											}

								html +=
								      		'</div>'+
								      		'<div style="font-weight: 700; font-size: 28px; margin-top: 5px;color: #fff ">'+
											data[i].alamat+
											'</div>'+
											'<div style="font-weight: 700; font-size: 14px; margin-top: 3px;margin-left: 10px;color: #fff ">'+
												data[i].kota+', '+data[i].propinsi+ 
												'&nbsp <span class="taglokasi btn">&nbsp<span class="glyphicon glyphicon-map-marker"></span>&nbspLihat Lokasi&nbsp</span>'+
											'</div>'+
								      	'</div>'+
								      '</div>'+
								'</section>';

			                    }
			                    $('#header_kost').html(html);

			                    var html2='<H1>'+data[0].no_hp+'</H1>';

			                    $('#no_hpp').html(html2);

			                }
			            });
		        }
 
    });
	</script>

</body>
</html>