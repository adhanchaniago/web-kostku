

		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


		<script type="<?=base_url()?>assets/js/jquery-3.3.1.min.js"></script>
		<script type="<?=base_url()?>assets/js/bootstrap.min.js"></script>

		<script src="<?php echo base_url()?>assets/dataTables/datatables.min.js"></script>

<script type="text/javascript">

    $(document).ready(function(){

    		pertanyaan();


	        $('#example').DataTable({
	          "processing":true,
	          "serverSide":true,
	          "lengthMenu":[[10,20,-1],[10,20,"All"]],
	          "ajax":{
	                url:"<?php echo site_url('Admin/data_server_pertanyaan')?>",
	                type:"POST"
	            },
	          "columnDefs":
				          [
				            {
				              "targets":0,
				              "data":"id_user",
				            },
				            {
				              "targets":1,
				              "data":"pertanyaan",
				            },
				            {
				              "targets":2,
				              "data":"kategori",
				            },
				            {
				              "targets":3,
				              "data":"hadiah",
				            },
				            {
				              "targets":4,
				              "data":"tingkatan",
				            },
				             {
				              "targets":5,
				              "data":"tanggal",
				            },
				            {
				              "targets":6,
				              "data": null,
				              "searchable":false,
				              "render":function(data,type,full,meta){
				                  return '<a href="<?=site_url()?>/Admin/soaledit/'+data["id_q"]+'"><button type="button" class="btn btn-primary btn-group-sm">Detail Soal</button></a>'        
				             	 }
				            }
				          ]
	        });

	        $('#user_lst').DataTable({
	          "processing":true,
	          "serverSide":true,
	          "lengthMenu":[[10,20,-1],[10,20,"All"]],
	          "ajax":{
	                url:"<?php echo site_url('Admin/data_server_user')?>",
	                type:"POST"
	            },
	          "columnDefs":
				          [
				            {
				              "targets":0,
				              "data":"username",
				            },
				            {
				              "targets":1,
				              "data":"nama",
				            },
				            {
				              "targets":2,
				              "data":"pwd",
				            },
				            {
				              "targets":3,
				              "data":"email",
				            },
				            {
				              "targets":4,
				              "data":"level",
				            },
				             {
				              "targets":5,
				              "data":"tanggal",
				            },
				            {
				              "targets":6,
				              "data": null,
				              "searchable":false,
				              "render":function(data,type,full,meta){
				                  return '<a href="<?=site_url()?>/Admin/detailUser/'+data["id"]+'"><button type="button" class="btn btn-primary btn-group-sm">detail user</button></a>'        
				             	 }
				            }
				          ]
	        });

	        $('#mapel_lst').DataTable({
	          "processing":true,
	          "serverSide":true,
	          "lengthMenu":[[8,12,-1],[8,12,"All"]],
	          "ajax":{
	                url:"<?php echo site_url('Admin/data_server_mapel')?>",
	                type:"POST"
	            },
	          "columnDefs":
				          [
				            {
				              "targets":0,
				              "data": null,
				              "searchable":false,
				              "render":function(data,type,full,meta){
				                   return '<img width="60" height="65" src="<?=base_url()?>img/mapel/'+data["icon"]+'">';
				             	 }
				            },
				            {
				              "targets":1,
				              "data":"kategori",
				            },
				            {
				              "targets":2,
				              "data":"priority",
				            },
				            {
				              "targets":3,
				              "data": null,
				              "searchable":false,
				              "render":function(data,type,full,meta){
				                  return '<a href="<?=site_url()?>/Admin/lihatMapel/'+data["id"]+'"><button type="button" class="btn btn-primary btn-xs">Edit</button></a>'        
				             	 }
				            }
				            // ,{
				            //   "targets":4,
				            //   "data": null,
				            //   "searchable":false,
				            //   "render":function(data,type,full,meta){
				            //       return '<a href="<?=site_url()?>/Dosen/delete/'+data["id"]+'"><button type="button" class="btn btn-danger btn-xs">Delete</button></a>'        
				            // 	  }
				            // }
				          ]
	        });

	        $('#jawab_lst').DataTable({
	          "processing":true,
	          "serverSide":true,
	          "lengthMenu":[[10,20,-1],[10,20,"All"]],
	          "ajax":{
	                url:"<?php echo site_url('Admin/data_server_jawaban')?>",
	                type:"POST"
	            },
	          "columnDefs":
				          [
				            {
				              "targets":0,
				              "data":"id_user",
				            },
				            {
				              "targets":1,
				              "data":"jawaban",
				            },
				            {
				              "targets":2,
				              "data":"tanggal",
				            },
				            {
				              "targets":3,
				              "data": null,
				              "searchable":false,
				              "render":function(data,type,full,meta){
				                  return '<a href="<?=site_url()?>/Admin/lihatJawaban/'+data["id_a"]+'"><button type="button" class="btn btn-info btn-xs">Lihat</button></a>'        
				             	 }
				            }
				          ]
	        });

	        $("#answer_Edit").click(function(){
                	 if (true) {
                		$('#id_a_t').attr('value',$('#id_comt').val());
			            $('#editQusetion').modal('show');
                	}
		            
		        });

	        $("#Bertanya").click(function(){
        			pertanyaan();
		        });
		        
		    $("#Menjawab").click(function(){
        			menjawab();
		        });

		    function pertanyaan(){
                	 $.ajax({
			                type  : 'ajax',
			                url   : '<?php echo site_url('Helpmy/showPertanyaan')?>',
			                async : false,
			                dataType : 'json',
			                success : function(data){
			                    var html = '';
			                    var i;
			                    for(i=0; i<data.length; i++){
			                    	 html += 
			                    	 		'<div style="background-color: #FFFFFF">'+
												'<br>'+
												'<div style="padding-left: 4%;padding-right: 4%;padding-top: 1%;">'+
													'<div class="row">'+
														'<img src="<?=base_url()?>img/upload/'+data[i].foto+'" width="32" height="32">&nbsp'+
														'<div style="margin-left: 2%">'+
															'<b>'+data[i].id_user+'</b> <br>'+
																data[i].tanggal+
														'</div>'+
													'</div>'+
													
													'<div style="padding-left: 5%;padding-right: 1%;padding-top: 0.5%;font-size: 18px;">'+
														'<a style="color: black" href="<?=site_url()?>/Helpmy/detailpertanyaan/'+data[i].id_q+'">'+	
															data[i].pertanyaan+
														'</a>'+
													'</div>'+
													'<br>'+
													'<div style="padding-left: 5%">'+
														'<button type="button" class="btn btn-default btn-xs button_like"><b>❤ TERIMA KASIH </b></button> &nbsp'+
														'<a href="">Komentar (0)</a> &nbsp'+
													'</div>'+
													'<br>'+
													'<div style="height: 1px;background-color: #E1E8ED"></div>'+
												'</div>'+
											'</div>';
			                    }
			                    $('#pertanyaan').html(html);
			                }
			            });
		        }




    });

  </script>
	</body>
</html>