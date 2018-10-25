<!-- Bootstrap core and JavaScript
	====================================================== -->

	<!-- Placed at the end of the document so the  pages load faster -->
	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<!-- <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.3.1.min.js'?>"></script> -->
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.dataTables.js'?>"></script>
	<script type="text/javascript">
    var id_kost = $('#id_kost').val();
	$(document).ready(function(){
        $('[name="id_k"]').val(id_kost);
        show_kamar(); //call function show all product
          
        //function show kamar
        function show_kamar(){
            $.ajax({
                type  : 'post',
                url   : '<?php echo base_url();?>index.php/User/getKamar',
                data : {id_kost:id_kost},
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                            '<td>'+data[i].ukuran+'</td>'+
                            '<td><img src="<?=base_url()?>./assets/img_kamar/'+data[i].foto_kamar+'" height="100" width="130"></td>'+
                            '<td>'+data[i].harga+'</td>'+
                            '<td>'+
                            '<a href="javascript:void(0);" class="btn btn-info btn-sm item_detail" data-id_kamar="'+data[i].id_kamar+'">Daftar</a>'+
                            '</td>';
                            if (data[i].is_rented == 1) {
                                html += '<td>'+
                                '<a href="javascript:void(0);" class="btn btn-warning btn-sm item_kosongkan" data-id_kamar="'+data[i].id_kamar+'">Kosongkan</a>'+
                                '</td>';
                            }else{
                                html += '<td>'+
                                '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_sewakan" data-id_kamar="'+data[i].id_kamar+'">Sewakan</a>'+
                                '</td>';
                            }
                        html += '<td>'+
                            '<a href="javascript:void(0);" class="btn btn-warning btn-sm item_edit" data-id_kamar="'+data[i].id_kamar+'" data-ukuran="'+data[i].ukuran+'" data-harga="'+data[i].harga+'" data-lfoto="'+data[i].foto_kamar+'">Edit</a>'+
                            '</td>'+
                            '<td>'+
                                '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id_kamar="'+data[i].id_kamar+'">Hapus</a>'+
                            '</td>'+
                            '</tr>'; 	
                    }
                    $('#show_data').html(html);

                    $(".table").DataTable();
                    
                }
 
            });
        }

        //Save kamar
        $('#addKamar').submit(function(e){
	        e.preventDefault();
            $.ajax({
                url:'<?php echo base_url();?>index.php/User/upload_kamar', //URL submit
                type:"post", //method Submit
                data:new FormData(this), //penggunaan FormData
                processData:false,
                contentType:false,
                cache:false,
                async:false,
                success: function(data){
                	$('#addKamar').trigger("reset");
                	$('#Modal_Add').modal('hide');
                    $(".table").DataTable().destroy();
                    $('tbody').empty(); 
                    show_kamar();
                    $('[name="id_k"]').val(id_kost);
                }
            });
            return false;
        });

        //sewakan kamar
        $('#show_data').on('click','.item_sewakan',function(){
            var id_kamar = $(this).data('id_kamar');
             
            $('#Modal_Sewakan').modal('show');
            $('[name="id_kamar_sewakan"]').val(id_kamar);
        });

        //sewakan kamar to database
         $('#btn_sewakan').on('click',function(){
            var id_kamar_sewakan = $('#id_kamar_sewakan').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url(); ?>/User/sewakan",
                dataType : "JSON",
                data : {id_kamar:id_kamar_sewakan},
                success: function(){
                    $('[name="id_kamar_sewakan"]').val("");
                    $('#Modal_Sewakan').modal('hide');
                    $(".table").DataTable().destroy();
                    $('tbody').empty(); 
                    show_kamar();
                }
            });
            return false;
        });

        //kosongkan kamar
        $('#show_data').on('click','.item_kosongkan',function(){
            var id_kamar = $(this).data('id_kamar');
             
            $('#Modal_Kosongkan').modal('show');
            $('[name="id_kamar_kosongkan"]').val(id_kamar);
        });

        //kosongkan kamar to database
         $('#btn_kosongkan').on('click',function(){
            var id_kamar_kosongkan = $('#id_kamar_kosongkan').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url(); ?>/User/kosongkan",
                dataType : "JSON",
                data : {id_kamar:id_kamar_kosongkan},
                success: function(){
                    $('[name="id_kamar_kosongkan"]').val("");
                    $('#Modal_Kosongkan').modal('hide');
                    $(".table").DataTable().destroy();
                    $('tbody').empty(); 
                    show_kamar();
                }
            });
            return false;
        });

        //get data for link detail
        $('#show_data').on('click','.item_detail',function(){
            var id_kamar = $(this).data('id_kamar');
             
            setTimeout(' window.location.href = "<?php echo site_url(); ?>/User/fasilitas/'+id_kamar+'" ',500);
        });

        //get data for update record
        $('#show_data').on('click','.item_edit',function(){
          var id_kamar        = $(this).data('id_kamar');
          var ukuran        = $(this).data('ukuran');
          var harga        = $(this).data('harga');
          var lfoto          = $(this).data('lfoto');
             
          $('#Modal_Edit').modal('show');
          $('[name="id_kamar_edit"]').val(id_kamar);
          $('[name="ukuran_edit"]').val(ukuran);
          $('[name="harga_edit"]').val(harga);
          $('[name="lfoto"]').val(lfoto);
        });
        
        //update record to database
        $('#editKamar').submit(function(e){
          e.preventDefault();
          $.ajax({
            url:'<?php echo base_url();?>index.php/User/edit_kamar', //URL submit
            type:"post", //method Submit
            data:new FormData(this), //penggunaan FormData
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            success: function(data){
              $('#editKamar').trigger("reset");
              $('#Modal_Edit').modal('hide');
              $(".table").DataTable().destroy();
              $('tbody').empty(); 
              show_kamar();
            }
          });
          return false;
        });

        //get data for delete record
        $('#show_data').on('click','.item_delete',function(){
            var id_kamar = $(this).data('id_kamar');
             
            $('#Modal_Delete').modal('show');
            $('[name="id_kamar_delete"]').val(id_kamar);
        });

        //delete record to database
         $('#btn_delete').on('click',function(){
            var id_kamar_delete = $('#id_kamar_delete').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url(); ?>/User/delete_kamar",
                dataType : "JSON",
                data : {id_kamar:id_kamar_delete},
                success: function(){
                    $('[name="id_kamar_delete"]').val("");
                    $('#Modal_Delete').modal('hide');
                    $(".table").DataTable().destroy();
                    $('tbody').empty();	
                    show_kamar();
                }
            });
            return false;
        });
 
    });
	</script>
	</body>
</html>