<!-- Bootstrap core and JavaScript
	====================================================== -->

	<!-- Placed at the end of the document so the  pages load faster -->
	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<!-- <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.3.1.min.js'?>"></script> -->
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.dataTables.js'?>"></script>
	<script type="text/javascript">
	$(document).ready(function(){
        show_kost(); //call function show all product

        // $('#mydata').dataTable();
        var flag = false;
          
        //function show all manga
        function show_kost(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url();?>index.php/User/getKost',
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                            '<td>'+data[i].alamat+'</td>'+
                            '<td>'+data[i].kota+'</td>'+
                            '<td>'+data[i].propinsi+'</td>'+
                            '<td>'+data[i].Kelamin+'</td>'+
                            '<td>'+data[i].deskripsi+'</td>'+
                            '<td>'+data[i].jumlah_kamar+'</td>'+
                            '<td><img src="<?=base_url()?>./assets/img_kost/'+data[i].foto_kost+'" height="100" width="130"></td>'+
                            '<td>'+
                            '<a href="javascript:void(0);" class="btn btn-info btn-sm item_detail" data-id_kost="'+data[i].id_kost+'">Data</a>'+
                            '</td>'+
                            '<td>'+
                            '<a href="javascript:void(0);" class="btn btn-warning btn-sm item_edit" data-id_kost="'+data[i].id_kost+'" data-alamat="'+data[i].alamat+'" data-kelamin="'+data[i].Kelamin+'" data-deskripsi="'+data[i].deskripsi+'" data-lfoto="'+data[i].foto_kost+'">Edit</a>'+
                            '</td>'+
                            '<td>'+
                                '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id_kost="'+data[i].id_kost+'" data-title="'+data[i].title+'">Hapus</a>'+
                            '</td>'+
                            '</tr>'; 	
                    }
                    $('#show_data').html(html);

                    $(".table").DataTable();
                    
                }
 
            });
        }

        //Save manga
        $('#addKost').submit(function(e){
	        e.preventDefault();
            $.ajax({
                url:'<?php echo base_url();?>index.php/User/upload_kost', //URL submit
                type:"post", //method Submit
                data:new FormData(this), //penggunaan FormData
                processData:false,
                contentType:false,
                cache:false,
                async:false,
                success: function(data){
                	$('#addKost').trigger("reset");
                	$('#Modal_Add').modal('hide');
                    $(".table").DataTable().destroy();
                    $('tbody').empty(); 
                    show_kost();
                }
            });
            return false;
        });

        //get data for link detail
        $('#show_data').on('click','.item_detail',function(){
            var id_kost = $(this).data('id_kost');
             
            setTimeout(' window.location.href = "<?php echo site_url(); ?>/Admin/chapter/'+id_kost+'" ',500);
        });

        //get data for update record
        $('#show_data').on('click','.item_edit',function(){
          var alamat        = $(this).data('alamat');
          var kelamin           = $(this).data('kelamin');
          var deskripsi        = $(this).data('deskripsi');
          var lfoto          = $(this).data('lfoto');
             
          $('#Modal_Edit').modal('show');
          $('[name="alamat_edit"]').val(alamat);
          $('[name="Kelamin_edit"]').val(kelamin);
          $('[name="deskripsi_edit"]').val(deskripsi);
          $('[name="lfoto"]').val(lfoto);
        });
        
        //update record to database
        $('#editKost').submit(function(e){
          e.preventDefault();
          $.ajax({
            url:'<?php echo base_url();?>index.php/User/edit_kost', //URL submit
            type:"post", //method Submit
            data:new FormData(this), //penggunaan FormData
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            success: function(data){
              $('#editKost').trigger("reset");
              $('#Modal_Edit').modal('hide');
              $(".table").DataTable().destroy();
              $('tbody').empty(); 
              show_kost();
            }
          });
          return false;
        });

        //get data for delete record
        $('#show_data').on('click','.item_delete',function(){
            var id_kost = $(this).data('id_kost');
             
            $('#Modal_Delete').modal('show');
            $('[name="id_kost_delete"]').val(id_kost);
        });

        //delete record to database
         $('#btn_delete').on('click',function(){
            var id_kost_delete = $('#id_kost_delete').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url(); ?>/User/delete_kost",
                dataType : "JSON",
                data : {id_kost:id_kost_delete},
                success: function(){
                    $('[name="id_kost_delete"]').val("");
                    $('#Modal_Delete').modal('hide');
                    $(".table").DataTable().destroy();
                    $('tbody').empty();	
                    show_kost();
                }
            });
            return false;
        });
 
    });
	</script>
	</body>
</html>