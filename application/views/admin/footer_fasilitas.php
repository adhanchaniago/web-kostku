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
                            '<td><a href="javascript:void(0);" class="btn btn-warning btn-sm item_edit" data-id_user="'+data[i].id_user+'" data-username="'+data[i].username+'" data-password="'+data[i].password+
                            '" data-email="'+data[i].email+'" data-nohp="'+data[i].no_hp+'" data-level="'+data[i].level+'" data-status="'+data[i].is_activated+'">Edit</a>'+
                            '</td>'+
                            '<td>'+
                                '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id_user="'+data[i].id_user+'">Hapus</a>'+
                            '</td>'+
                            '</tr>';
                    }
                    $('#show_data').html(html);

                    $(".table").DataTable();
                    
                }
 
            });
        }


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

        //get data for delete record
       
 
    });
	</script>
	</body>
</html>