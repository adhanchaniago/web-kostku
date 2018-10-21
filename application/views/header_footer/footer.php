

		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


		<script type="<?=base_url()?>assets/js/jquery-3.3.1.min.js"></script>
		<script type="<?=base_url()?>assets/js/bootstrap.min.js"></script>

		<script type="text/javascript">

        $(document).ready(function(){
        	pertanyaan();

        		$("#Bertanya").click(function(){
        			pertanyaan();
		        });
		        
		        $("#Menjawab").click(function(){
        			menjawab();
		        });

		        $("#liked").click(function(){
        			like();
		        });

		        function like() {
		        	var id_quest = $('#questionjawab').val();
		        	var id_jwb = $('#id_jawab').val();
		        	 $.ajax({
		                type : "POST",
		                url  : "<?php echo site_url('Helpmy/like'); ?>",
		                dataType : "JSON",
		                data : {id_q:id_quest,id_j:id_jwb},
		                success: function(){
		                    // $('[name="id_manga_recomend"]').val("");
		                    // $('#Modal_Recomend').modal('hide');
		                    // $(".table").DataTable().destroy();
		                    // $('tbody').empty();	
		                    // show_manga();
		                }
		            });
		            return false;
		        }

                $("#btn_save").click(function(){
                	 if (true) {
                		$('#id_q_t').attr('value',$('#id_q').val());
                		$('#id_hadiah_t').attr('value',$('#id_hadiah').val());
                		$('#id_poin_t').attr('value',$('#id_poin').val());
			            $('#jwb_t').text($('#jwb').val());
			            $('#modal_jwb').modal('show');
                	}
		            
		        });

		        $("#answer_Edit").click(function(){
                	 if (true) {
                		$('#id_a_t').attr('value',$('#id_comt').val());
			            $('#editQusetion').modal('show');
                	}
		            
		        });
		        
		        $(".delete_comnt").click(function(){
                	
		        	return confirm("Apa anda YAKIN ingin HAPUS ini ?");

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

		        function menjawab(){
                	 $.ajax({
			                type  : 'ajax',
			                url   : '<?php echo site_url('Helpmy/showMenjawab')?>',
			                async : false,
			                dataType : 'json',
			                success : function(data){
			                    var html = '';
			                    var i;

			                    for(i=0; i<data.length; i++){
			                    	var fotot = $('#foto'+data[i].id_penanya).val();			                    	
			                    	var fotoj = $('#foto'+data[i].id_pnjwb).val();
			                    	 html += 
			                    	 		'<div style="background-color: #FFFFFF">'+
												'<br>'+
												'<div style="padding-left: 4%;padding-right: 4%;padding-top: 1%;">'+
													'<div class="row">'+	
														'<img src="<?=base_url()?>img/upload/'+fotot+'" width="32" height="32">&nbsp '+
														'<div style="margin-left: 2%">'+
															'<b>'+data[i].id_penanya+'</b><br>'+
															'<div style="font-size: 11px">'+
																data[i].kategori+
															'</div>'+
														'</div>'+
													'</div>'+
													
													'<div style="padding-left: 5%;padding-right: 1%;padding-top: 0.5%;font-size: 18px;">'+
														'<a style="color: black" href="<?=site_url()?>/Helpmy/detailpertanyaan/'+data[i].id_question+'">'+
															data[i].pertanyaan+
														'</a>'+
														'<div style="height: 1px;background-color: #207245"></div>'+
													'</div>'+
													'<br>'+
													'<div style="padding-left: 5%">'+
														'<!-- sUBBBBBBBBBBBBb -->'+
														'<div style="padding-left: 4%;padding-right: 4%;padding-top: 1%;">'+
															'<div class="row">'+
																'<img src="<?=base_url()?>img/upload/'+fotoj+'" width="32" height="32">&nbsp '+
																'<div style="margin-left: 2%;font-size: 12px">'+
																	// '<b>'data[i].id_pnjwb+'</b> <br>'+
																	data[i].tanggal+
																'</div>'+
															'</div>'+
															
															'<div style="padding-left: 7%;padding-right: 1%;padding-top: 0.5%;font-size: 18px;">'+
																data[i].jawaban+
																'<div style="height: 1px;background-color: #207245"></div>'+
															'</div>'+
														'</div>'+
														 '&nbsp'+
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