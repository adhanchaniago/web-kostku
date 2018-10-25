<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


		<script type="<?=base_url()?>assets/js/jquery-3.3.1.min.js"></script>
		<script type="<?=base_url()?>assets/js/bootstrap.min.js"></script>

	<script type="text/javascript">
	$(document).ready(function(){
        show_kost(); //call function show all product

        // $('#mydata').dataTable();
        var flag = false;
      

        function show_kost(){
                	 $.ajax({
			                type  : 'ajax',
			                url   : '<?php echo site_url('Kostku/getKostku')?>',
			                async : false,
			                dataType : 'json',
			                success : function(data){
			                    var html = '';
			                    var i;
			                    for(i=0; i<data.length; i++){
			                    	 html += 
			                    	 		'<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="margin-top: 20px">'+
												'<div class="card">'+
													'<img class="img-responsive" src="<?=base_url()?>assets/img_kost/'+data[i].foto_kost+'">'+
													'<div>'+
														'<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="background-color: #27AB27">'+
															'<div class="text-center" style=";color: #fff;font-weight: 700; ">ADA '+data[i].jumlah_kamar+' KAMAR</div>'+
														'</div>'+
														'<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">'+
															'<span style="color: #27AB27;font-weight: 700">Rp. '+data[i].harga+'/bln</span>'+
														'</div>'+	
													'</div>'+
													
													'<div style="margin-left: 8px;">';
															if (data[i].Kelamin=="Putri") {
																html +='<button class="tagputri btn">'+data[i].Kelamin+'</button>';
															}else if(data[i].Kelamin=="Putra"){
																html +='<button class="tagputra btn">'+data[i].Kelamin+'</button>';
															}else{
																html +='<button class="tagcampur btn">'+data[i].Kelamin+'</button>';
															}
									html += 		'</div>'+

													'<div style="font-weight: 700; font-size: 18px; margin-left: 10px; margin-top: 5px ">'+
														'<a href="" style="color: #3e5168;">'+data[i].alamat+'</a>'+
													'</div>'+
													'<br><br>'+
													'<a style="text-decoration: none; color: #2d2d2d;" href="<?php echo site_url('/Kostku/lihat_kost/')?>'+data[i].id_k+'">'+
														'<button class="btn btn-group-justified">Hubungi Kost Ini</button>'+
													'</a>'+
												'</div>'+
											'</div>';
			                    }
			                    $('#show_kost').html(html);
			                }
			            });
		        }
 
    });
	</script>

	</body>
</html>