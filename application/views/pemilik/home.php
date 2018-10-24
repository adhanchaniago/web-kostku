<?php $this->load->view('pemilik/header'); ?>

  <div class="container-fluid">
  <ol class="breadcrumb">
    <li class="active">Home</li>
  </ol>
    <div class="panel panel-default">
      <div class="panel-heading"> Daftar Kost</div>
      <div class="panel-body">
        <div class="pull-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Tambah Kost</a></div>
        <table class="table table-striped" id="mydata">
          <thead>
            <tr>
              <th>Alamat</th>
              <th>Kota</th>
              <th>Propinsi</th>
              <th>Gender</th>
              <th>Deskripsi</th>
              <th>Jumlah Kamar</th>
              <th>Foto Kost</th>
              <th>Kamar</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody id="show_data">

          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- MODAL ADD -->
  <form class="form-horizontal" id="addKost">
    <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Tambah Kost Baru</h4>
          </div>
          <div class="modal-body">
          <input type="hidden" name="idM" id="idM" value="">
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Alamat</label>
                <div class="col-md-10">
                  <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat" required>
                </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Gender</label>
              <div class="col-md-10">
                <input type="text" name="Kelamin" id="Kelamin" class="form-control" placeholder="Gender">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Deskripsi</label>
              <div class="col-md-10">
                <input type="text" name="deskripsi" id="deskripsi" class="form-control" placeholder="Deskripsi" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Foto Kost</label>
              <div class="col-md-10">
                <input type="file" name="file" id="file" required>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" id="btn_save" class="btn btn-primary">Save</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  <!--END MODAL ADD--> 

  <!-- MODAL EDIT -->
  <form class="form-horizontal" id="editKost">
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
                  <input type="text" name="alamat_edit" id="alamat_edit" class="form-control" placeholder="Alamat">
                </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Gender</label>
              <div class="col-md-10">
                <input type="text" name="Kelamin_edit" id="Kelamin_edit" class="form-control" placeholder="Gender">
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
              <h4 class="modal-title">Hapus kost</h4>
            </div>
            <div class="modal-body">
              <strong>Apakah Anda Yakin Ingin Menghapus Kost Berikut?</strong>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="id_kost_delete" id="id_kost_delete" class="form-control">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
              <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  <!--END MODAL DELETE-->

<?php $this->load->view('pemilik/footer'); ?>