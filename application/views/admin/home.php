<?php $this->load->view('admin/header'); ?>

  <div class="container-fluid">
  <ol class="breadcrumb">
    <li class="active">Home</li>
  </ol>
    <div class="panel panel-default">
      <div class="panel-heading"> Daftar User</div>
      <div class="panel-body">
        <div class="pull-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Tambah User</a></div>
        <table class="table table-striped" id="mydata">
          <thead>
            <tr>
              <th>No</th>
              <th>username</th>
              <th>password</th>
              <th>email</th>
              <th>Hp</th>
              <th>level</th>
              <th>status</th>
              <th>Edit</th>
              <th>Hapus</th>
            </tr>
          </thead>
          <tbody id="show_data">

          </tbody>
        </table>
      </div>
    </div>
  </div>




<!-- Modal -->
    <div id="Modal_Add" class="modal fade" role="dialog">
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

            <div id="responseDivS" class="alert text-center" style="margin-top:20px; display:none;">
              <button type="button" class="close" id="clearMsgS"><span aria-hidden="true">&times;</span></button>
              <span id="messageS"></span>
            </div>
                
            <CENTER>
              <button type="button" class="btn btn-success" id="btn_signup">Sign Up</button>
            </CENTER>
          </div>
          <div class="modal-footer">
           
          </div>
        </div>

      </div>
    </div>
<!-- End MODAL ADD-->

  <!-- MODAL EDIT -->
  <form class="form-horizontal" id="editUser">
    <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Edit Kost</h4>
          </div>
          <div class="modal-body">
          <input type="hidden" name="id_kost_edit" id="id_kost_edit">
          <input type="hidden" name="lfoto" id="lfoto">
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Alamat</label>
                <div class="col-md-10">
                  <input type="text" name="alamat_edit" id="alamat_edit" class="form-control" placeholder="Alamat" readonly>
                </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Gender</label>
              <div class="col-md-10">
                <input type="text" name="kelamin_edit" id="kelamin_edit" class="form-control" placeholder="Gender">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Deskripsi</label>
              <div class="col-md-10">
                <input type="text" name="deskripsi_edit" id="deskripsi_edit" class="form-control" placeholder="Deskripsi" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Foto Kost</label>
              <div class="col-md-10">
                <input type="file" name="file" id="file">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" id="btn_update" class="btn btn-primary">Update</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  <!--END MODAL EDIT-->

  <!--MODAL DELETE-->
    <form>
      <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Hapus User</h4>
            </div>
            <div class="modal-body">
              <strong>Apakah Anda Yakin Ingin Menghapus User Berikut?</strong>
            </div>
            <div class="modal-footer">
              <input type="text" name="id_user_delete" id="id_user_delete" class="form-control">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
              <button type="button" type="submit" id="btn_deleted" class="btn btn-primary">Yes</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  <!--END MODAL DELETE-->

<?php $this->load->view('admin/footer'); ?>