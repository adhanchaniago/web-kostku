<!-- Bootstrap core and JavaScript
	====================================================== -->

	<!-- Placed at the end of the document so the  pages load faster -->
	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<!-- <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.3.1.min.js'?>"></script> -->
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.dataTables.js'?>"></script>
	<script type="text/javascript">
	$(document).ready(function(){
        show_fasilitas(); //call function show all product

        // $('#mydata').dataTable();
        var flag = false;
          
        //function show all manga
        function show_fasilitas(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url();?>index.php/Admin/getFasilitas',
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        a=i+1;
                        html += '<tr>'+
                            '<td>'+a+'</td>'+
                            '<td><img src="<?=base_url()?>./assets/ico/'+data[i].icon+'" height="35" width="35"></td>'+
                            '<td>'+data[i].kategori+'</td>'+
                            '<td>'+data[i].nama_fasilitas+'</td>'+
                            '<td>'+data[i].id_fasilitas+'</td>'+
                            '<td><a href="javascript:void(0);" class="btn btn-warning btn-sm item_edit" data-id_fas="'+data[i].id_fasilitas+'" data-nama_fasilitas="'+data[i].nama_fasilitas+'" data-icon="'+data[i].icon+'" data-kategori="'+data[i].kategori+'">Edit</a>'+
                            '</td>'+
                            '<td>'+
                                '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id_fasilitas="'+data[i].id_fasilitas+'">Hapus</a>'+
                            '</td>'+
                            '</tr>';
                    }
                    $('#show_data').html(html);

                    $(".table").DataTable();
                    
                }
 
            });
        }
// ???????????  STart  EDITTT   UPDATEEE  FASILITAS   ??????????///////////////////
 
        $('#show_data').on('click','.item_edit',function(){ //get data for update record
          var id_fa        = $(this).data('id_fas'); //get id fasilitas
          var kat        = $(this).data('kategori'); //get kategori
          var namaf        = $(this).data('nama_fasilitas'); //get nama fasilitas
          var ico        = $(this).data('icon'); ///get icon
             
          $('#Modal_Edit').modal('show');
          // $('[name="fileE"]').val(ico);
          $('[name="namaE"]').val(namaf);
          // $('[name="kategoriE"]').val(kat);
          $('[name="idf"]').val(id_fa);
          
        });
        
        //update record to database
        $('#editfasilitas').submit(function(e){
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
              $('#editfasilitas').trigger("reset");
              $('#Modal_Edit').modal('hide');
              $(".table").DataTable().destroy();
              $('tbody').empty(); 
              show_fasilitas();
            }
          });
          return false;
        });

// ???????????  endddd  EDITTT   UPDATEEE  FASILITAS   ??????????///////////////////



// /////  // / add Fasilitas  ////////////////////////////////////////////
        $('#Add_fasilitas').submit(function(e){
            e.preventDefault();
            $.ajax({
                url:'<?php echo base_url();?>index.php/Admin/upload_fasilitas', //URL submit
                type:"post", //method Submit
                data:new FormData(this), //penggunaan FormData
                processData:false,
                contentType:false,
                cache:false,
                async:false,
                success: function(data){
                    $('#Add_fasilitas').trigger("reset");
                    $('#Modal_Add_fasilitas').modal('hide');
                    $(".table").DataTable().destroy();
                    $('tbody').empty(); 
                    show_fasilitas();
                }
            });
            return false;
        });

///////////  Delete Modalll ////////////
        // show modal Delete
         $('#show_data').on('click','.item_delete',function(){
            var id_fasilitas = $(this).data('id_fasilitas');
             
            $('#Modal_Delete').modal('show');
            $('[name="id_fasilitas"]').val(id_fasilitas);
        });

        //delete record to database
         $('#btn_deleted').on('click',function(){
            var id_fasilitas = $('#id_fasilitas').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url(); ?>/Admin/delete_Fasilitas",
                dataType : "JSON",
                data : {id_fasilitas:id_fasilitas},
                success: function(){

                    $('[name="id_fasilitas"]').val("");
                    $('#Modal_Delete').modal('hide');
                    $(".table").DataTable().destroy();
                    $('tbody').empty(); 
                    show_fasilitas();
                }
            });
            return false;
        });

///////////  Delete Modalll ////////////
       
 
    });
	</script>
	</body>
</html>