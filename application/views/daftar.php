<?php $this->load->view('header_footer/headerlogin'); ?>

			<?php
		      //menampilkan error menggunakan alert javascript
		        if(isset($error)){
		        echo '<script> alert("'.$error.'"); 
		        	  </script>';
		        }
		  ?>

<div style="margin: 4%">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="margin-left: 50px">
      <div class="jumbotron" style="background-color: #FFFFFE">
      	<center>
      		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="margin: 2%">
      			<img class="img-responsive" src="<?=base_url()?>img/daftarr.png">
      		</div>  
      	</center>
              <h2>Cari Kost mu disini ?</h2><br><br>
              <p>Forum yang berisi topik tentang Berbagi Ilmu, Ajukan pertanyaanmu dan beri pengguna lain diseluruh Indonesia untuk menjawab pertanyaan mu.</p>
          </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="margin-left: 70px">
            <?php echo form_open('Kostku/login');?>
            <?php echo validation_errors(); ?>
                <div id="login">

                    <h2><span class="fontawesome-lock"></span>Sign In</h2>

                    <form action="javascript:void(0);" method="POST">

                      <fieldset>

                        <p><label for="uname">Username</label></p>
                        <p><input type="text" class="form-control" name="usernamee" id="uname" value="username" onBlur="if(this.value=='')this.value='username'" onFocus="if(this.value=='username')this.value=''"></p> <!-- JS because of IE support; better: placeholder="mail@address.com" -->

                        <p><label for="paswd">Password</label></p>
                        <p><input type="password"  class="form-control" name="paswd" id="paswd" value="password" onBlur="if(this.value=='')this.value='password'" onFocus="if(this.value=='password')this.value=''"></p> <!-- JS because of IE support; better: placeholder="password" -->

                        <p><input type="submit" value="Sign In"></p>
                          <div style="text-align: center;">
                              <span align="center">Not Registered? <a href="" style="text-decoration: none" data-toggle="modal" data-target="#myModal">Create an account</a></span>
                          </div>
                      </fieldset>

                    </form>
                    
                    

                  </div>        
              <?php echo form_close(); ?> 
  
    </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Daftar Sekarang</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('Kostku/mendaftar');?>
        <?php echo validation_errors(); ?>
        
              <div class="form-group">
                <label for="usr">Name :</label>
                <input type="text" class="form-control" name="usr" placeholder="username" required="not null">
              </div>
              <div class="form-group">
                <label for="usr">Nomor :</label>
                <input type="text" class="form-control" name="nohp" placeholder="Nomor Hp" required="not null">
              </div>
              <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" class="form-control" name="email" placeholder="email@address.com" required="">
              </div>
              <div class="form-group">
                <label for="pwd">Password :</label>
                <input type="password" class="form-control" name="pwd" id="pwd"  required="">
              </div>              
              <div class="form-group">
                <label for="pwd">Re-Password :</label>
                <input type="password" class="form-control" name="repwd" required="">
              </div>
            
            <CENTER>
                <input type="submit" class="btn" name="signup" value="Daftar" style="background-color: #27AB27;color: #fff">
            </CENTER>
        <?php echo form_close(); ?> 
      </div>
      <div class="modal-footer">
       
      </div>
    </div>

  </div>
</div>


<?php $this->load->view('header_footer/footer'); ?>