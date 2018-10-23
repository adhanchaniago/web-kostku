<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


		<script type="<?=base_url()?>assets/js/jquery-3.3.1.min.js"></script>
		<script type="<?=base_url()?>assets/js/bootstrap.min.js"></script>

		<script type="text/javascript">
	    $(document).ready(function(){
			$('#btn_login').on('click',function(){
	            var username = $('#uname').val();
	            var password = $('#paswd').val();
	            $.ajax({
	                type : "POST",
	                url  : "<?php echo site_url('Login/login') ?>",
	                dataType : "JSON",
	                data : {username:username,password:password},
	                success: function(response){
	                	$('#message').html(response.message);
						if(response.error){
							$('#responseDiv').removeClass('alert-success').addClass('alert-danger').show();
						}
						else{
							$('#responseDiv').removeClass('alert-danger').addClass('alert-success').show();
							$('#uname').val("");
							$('#paswd').val("");
							if (response.level == "Administrator") {
								setTimeout(' window.location.href = "<?php echo site_url('Admin'); ?>" ',3000);
							}else{
								setTimeout(' window.location.href = "<?php echo site_url('User'); ?>" ',3000);
							}
						}
	                }
	            });
	            $(document).on('click', '#clearMsg', function(){
					$('#responseDiv').hide();
				});
	            return false;
	        });
	        $('#btn_sign').on('click',function(){
	            var username = $('#user_sign').val();
	            var email = $('#email_sign').val();
	            var no_hp = $('#no_hp_sign').val();
	            var password = $('#pass_sign').val();
	            var confirm_password = $('#con_pass_sign').val();
	            if (confirm_password != password) {
	            	$('#messageS').html('Your Passwords Must Match');
	            	$('#responseDivS').removeClass('alert-success').addClass('alert-danger').show();
	            }
	            else{
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
								// if (response.level == "Administrator") {
									setTimeout(' window.location.href = "<?php echo site_url('Kostku/daftar'); ?>" ',900);
								// }
							}
		                }
		            });
	            }
	            $(document).on('click', '#clearMsgS', function(){
					$('#responseDivS').hide();
				});
	            return false;
	        });
	 
	    });
	     
	</script>

	</body>
</html>