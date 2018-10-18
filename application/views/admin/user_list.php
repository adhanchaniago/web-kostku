<?php $this->load->view('header_footer/header_admin');?>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading"> 
            List User
            <?php echo validation_errors(); ?>
            <button class="btn btn-success btn-xs float-sm-right" data-toggle="modal" data-target="#newUser">New User</button>&nbsp&nbsp
            <a href="<?=site_url('')?>/Cetak/listUser"><button class="btn btn-info btn-xs float-sm-right" style="margin-right: 5px">Cetak</button></a>
        </div>
        <div class="panel-body">
            <table class="table table-striped" id="user_lst">
                <thead>     
                    <th>Username</th>
                    <th>nama</th>
                    <th>password</th>
                    <th>Email</th>
                    <th>level Access</th>
                    <th>tanggal</th>
                    <th>Detail</th>
                </thead>

                <tbody>
                    
                </tbody>
            </table>

            
        </div>
    </div>
</div>



<!-- Modal  nesquestion-->
   <div class="modal fade" id="newUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                
                <div class="modal-body">
                    <?php echo form_open('Admin/mendaftarUser');?>
                    <?php echo validation_errors(); ?>
                    <div class="form-horizontal">
                        <div class="form-group">
                            <legend><center><b>Buat Akun Baru</b></center></legend>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="username">Username:</label>
                            <div class="col-sm-10">
                              <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nama">Nama :</label>
                            <div class="col-sm-10">
                              <input type="text" name="nama" class="form-control" id="nama" placeholder="Enter Nama Lengkap" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Email:</label>
                            <div class="col-sm-10">
                              <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">Password:</label>
                            <div class="col-sm-10"> 
                              <input type="password" class="form-control" name="pswd" id="pwd" placeholder="Enter password">
                            </div>
                        </div>
                        <div class="form-group"> 
                            <div class="col-sm-offset-3 col-sm-6">
                              <input type="hidden" name="level" value="2">
                              <input type="submit" value="Mendaftar" class="btn btn-success" style="width:100%;">
                            </div>
                        </div>
                    </div>
                    <?php echo form_close(); ?> 
                </div>
            </div>
        </div>
    </div> 


<?php $this->load->view('header_footer/footer_admin');?>