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

        //Save manga
        $('#btn_signup').on('click',function(){
                var username = $('#user_sign').val();
                var email = $('#email_sign').val();
                var no_hp = $('#no_hp_sign').val();
                var password = $('#pass_sign').val();
                // var confirm_password = $('#con_pass_sign').val();
                // if (confirm_password != password) {
                //     $('#messageS').html('Your Passwords Must Match');
                //     $('#responseDivS').removeClass('alert-success').addClass('alert-danger').show();
                // }
                // else{
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo site_url('Login/sign_up') ?>",
                        dataType : "JSON",
                        data : {username:username,email:email,no_hp:no_hp,password:password},
                        success: function(response){
                            $('#messageS').html(response.message);
                            $('#sigText').html('Sign Up');
                            if(response.error){
                                $('#responseDivS').removeClass('alert-success').addClass('alert-danger').show();
                            }
                            else{
                                $('#responseDivS').removeClass('alert-danger').addClass('alert-success').show();
                                $('#user_sign').val("");
                                $('#email_sign').val("");
                                $('#no_hp_sign').val("");
                                $('#pass_sign').val("");
                                $('#con_pass_sign').val("");
                                 setTimeout(' window.location.href = "<?php echo site_url('Admin'); ?>" ',800);
                            }
                        }
                    });
                // }
                $(document).on('click', '#clearMsgS', function(){
                    $('#responseDivS').hide();
                });
                return false;
            });


        // show modal Delete
         $('#show_data').on('click','.item_delete',function(){
            var id_user = $(this).data('id_user');
             
            $('#Modal_Delete').modal('show');
            $('[name="id_user_delete"]').val(id_user);
        });

        //delete record to database
         $('#btn_deleted').on('click',function(){
            var id_user = $('#id_user_delete').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url(); ?>/Admin/delete_User",
                dataType : "JSON",
                data : {id_user:id_user},
                success: function(){

                    $('[name="id_user_delete"]').val("");
                    $('#Modal_Delete').modal('hide');
                    $(".table").DataTable().destroy();
                    $('tbody').empty(); 
                    show_kost();
                }
            });
            return false;
        });


        // Show edit USer modal
        $('#show_data').on('click','.item_edit',function(){
            var id_user = $(this).data('id_user');
            var uname = $(this).data('username');
            var password = $(this).data('password');
            var email = $(this).data('email');
            var nohp = $(this).data('nohp');
            var level = $(this).data('level');            
            var status = $(this).data('status');
             
            $('#Modal_Edit').modal('show');
            $('[name="id_user"]').val(id_user);
            $('[name="uname"]').val(uname);
            $('[name="password"]').val(password);
            $('[name="email"]').val(email);
            $('[name="nohp"]').val(nohp);
            $('[name="level"]').val(level);
            $('[name="status"]').val(status);
            
        });

        //update record to database
        $('#btn_update').submit(function(e){
            var id_user = $('#id_user').val();
            var uname = $('#uname').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var nohp = $('#nohp').val();
            var level = $('#level').val();
            var status = $('#status').val();

          e.preventDefault();
          $.ajax({
            url:'<?php echo base_url();?>index.php/Admin/update_User', //URL submit
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
       
 
    });
	</script>
	</body>
</html>