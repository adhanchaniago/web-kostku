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
    <div id="login">
      <h2><span class="fontawesome-lock"></span>Sign In</h2>

      <form id="form_login">

      <fieldset>

        <p><label for="uname">Username</label></p>
        <p><input type="text" class="form-control" name="usernamee" id="uname" onBlur="if(this.value=='')this.value='username'" onFocus="if(this.value=='username')this.value=''"></p> <!-- JS because of IE support; better: placeholder="mail@address.com" -->

        <p><label for="paswd">Password</label></p>
        <p><input type="password"  class="form-control" name="paswd" id="paswd" onBlur="if(this.value=='')this.value='password'" onFocus="if(this.value=='password')this.value=''"></p> <!-- JS because of IE support; better: placeholder="password" -->

        <div id="responseDiv" class="alert text-center" style="margin-top:20px; display:none;">
          <button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
          <span id="message"></span>
        </div>

        <center><button type="button" class="btn btn-success" id="btn_login">Sign In</button></center>
        <div style="text-align: center;">
          <span align="center">Not Registered? <a href="" style="text-decoration: none" data-toggle="modal" data-target="#myModal">Create an account</a></span>
        </div>
      </fieldset>

      </form>
                    
                    

    </div>
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
        
        <div class="form-group">
          <label for="usr">Name :</label>
          <input type="text" class="form-control" name="usr" id="user_sign" placeholder="username" required="not null">
        </div>
        <div class="form-group">
          <label for="usr">Nomor :</label>
          <input type="text" class="form-control" name="nohp" id="no_hp_sign" placeholder="Nomor Hp" required="not null">
        </div>
        <div class="form-group">
          <label for="email">Email :</label>
          <input type="email" class="form-control" name="email" id="email_sign" placeholder="email@address.com" required="">
        </div>
        <div class="form-group">
          <label for="pwd">Password :</label>
          <input type="password" class="form-control" name="pwd" id="pass_sign"  required="">
        </div>              
        <div class="form-group">
          <label for="pwd">Re-Password :</label>
          <input type="password" class="form-control" name="repwd" id="con_pass_sign" required="">
        </div>

        <div id="responseDivS" class="alert text-center" style="margin-top:20px; display:none;">
          <button type="button" class="close" id="clearMsgS"><span aria-hidden="true">&times;</span></button>
          <span id="messageS"></span>
        </div>
            
        <CENTER>
          <button type="button" class="btn btn-success" id="btn_sign">Sign Up</button>
        </CENTER>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>

  </div>
</div>


<?php $this->load->view('header_footer/footer'); ?>