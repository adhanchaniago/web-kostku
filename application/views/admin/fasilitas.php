<?php $this->load->view('admin/header'); ?>

  <div class="container-fluid">
  <ol class="breadcrumb">
    <li class="active">Home</li>
  </ol>
    <div class="panel panel-default">
      <div class="panel-heading">
          <a href="<?=site_url('Admin/')?>">Daftar User</a>  
          <a href="<?=site_url('Admin/data_fasilitas')?>">Daftar Fasilitas</a>
      </div>
      <div class="panel-body">
        <div class="pull-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Tambah Fasilitas</a></div>
        <table class="table table-striped" id="mydata">
          <thead>
            <tr>
              <th>No</th>
              <th>Icon</th>
              <th>kategori fasilitas</th>
              <th>Nama</th>
              <th>id</th>
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
              <label for="usr">Nama Fasilitas :</label>
              <input type="text" class="form-control" name="nm_fasilitas" id="nm_fasilitas" placeholder="nama Fasilitas" required="not null">
            </div>
            <div class="form-group">

              <div class="dropdown">
                  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Pilih Kategori </button>
                  <ul class="dropdown-menu">
                    <li><a href="#">Fasilitas Kamar</a></li>
                    <li><a href="#">Kamar Mandi</a></li>
                    <li><a href="#">Umum</a></li>
                    <li><a href="#">Parkir</a></li>
                  </ul>
              </div>
              
            </div>

            <div class="form-group">
              <label for="pwd">Icon :</label>
              <input type="file" class="form-control" name="icon" id="icon"  required="">
            </div>  

            <div id="responseDivS" class="alert text-center" style="margin-top:20px; display:none;">
              <button type="button" class="close" id="clearMsgS"><span aria-hidden="true">&times;</span></button>
              <span id="messageS"></span>
            </div>
                
            <CENTER>
              <button type="button" class="btn btn-success" id="btn_tambah">Tambahkan</button>
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
            <h4 class="modal-title">Edit User</h4>
          </div>
          <div class="modal-body">
            
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Id User</label>
                <div class="col-md-10">
                  <input type="text" name="id_user" id="id_user" class="form-control" readonly>
                </div>
            </div>
          
            <div class="form-group row">
              <label class="col-md-2 col-form-label">User name</label>
                <div class="col-md-10">
                  <input type="text" name="uname" id="uname" class="form-control"  >
                </div>
            </div>

            <div class="form-group row">
              <label class="col-md-2 col-form-label">Email</label>
              <div class="col-md-10">
                <input type="text" name="email" id="email" class="form-control" >
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-2 col-form-label">Password</label>
                <div class="col-md-10">
                  <input type="text" name="password" id="password" class="form-control"  >
                </div>
            </div>

            <div class="form-group row">
              <label class="col-md-2 col-form-label">Hp</label>
              <div class="col-md-10">
                <input type="text" name="nohp" id="nohp" class="form-control" >
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-2 col-form-label">Level</label>
                <div class="col-md-10">
                  <input type="text" name="level" id="level" class="form-control"  >
                </div>
            </div>

            <div class="form-group row">
              <label class="col-md-2 col-form-label">Status</label>
              <div class="col-md-10">
                <input type="text" name="status" id="status" class="form-control" >
              </div>
            </div>


          </div>
          <div class="modal-footer">

              <CENTER>
              <button type="button" class="btn btn-success" id="btn_update">Update</button>
            </CENTER>

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

<?php $this->load->view('admin/footer_fasilitas'); ?>