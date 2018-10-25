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
        <div class="pull-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add_fasilitas"><span class="fa fa-plus"></span> Tambah Fasilitas</a></div>
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




  <!-- MODAL ADD -->
  <form class="form-horizontal" id="Add_fasilitas">
    <div class="modal fade" id="Modal_Add_fasilitas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Tambah Kost Baru</h4>
          </div>
          <div class="modal-body">
            
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Icon Fasilitas</label>
              <div class="col-md-10">
                <input type="file" name="file" id="file" required>
              </div>
            </div>
            
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Nama Fasilitas</label>
                <div class="col-md-10">
                  <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Fasilitas" required>
                </div>
            </div>

            <div class="form-group row">
              <label class="col-md-2 col-form-label">Kategori Fasilitas</label>
              <div class="col-md-10">
                <!-- <input type="text" name="Kelamin" id="Kelamin" class="form-control" placeholder="Gender"> -->
                <select class="form-control" name="kategori" id="kategori">
                  <option value="Fasilitas Kamar">Fasilitas Kamar</option>
                  <option value="Kamar Mandi">Kamar Mandi</option>
                  <option value="Fasilitas Umum">Fasilitas Umum</option>
                  <option value="Fasilitas Parkir">Fasilitas Parkir</option>
                  <option value="Akses Lingkungan">Akses Lingkungan</option>
                </select>
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
              <input type="text" name="id_fasilitas" id="id_fasilitas" class="form-control">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
              <button type="button" type="submit" id="btn_deleted" class="btn btn-primary">Yes</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  <!--END MODAL DELETE-->



  <!-- MODAL EDIT -->
  <form class="form-horizontal" id="editfasilitas">
    <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Edit Kost</h4>
          </div>
         
         <div class="modal-body">
            <input type="text" name="idf" id="idf" class="form-control" readonly>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Icon Fasilitas</label>
              <div class="col-md-10">
                <input type="file" name="fileE" id="fileE" required>
              </div>
            </div>
            
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Nama Fasilitas</label>
                <div class="col-md-10">
                  <input type="text" name="namaE" id="namaE" class="form-control" required>
                </div>
            </div>

            <div class="form-group row">
              <label class="col-md-2 col-form-label">Kategori Fasilitas</label>
              <div class="col-md-10">
                <!-- <input type="text" name="Kelamin" id="Kelamin" class="form-control" placeholder="Gender"> -->
                <select class="form-control" name="kategoriE" id="kategoriE">
                  <option value="Fasilitas Kamar">Fasilitas Kamar</option>
                  <option value="Kamar Mandi">Kamar Mandi</option>
                  <option value="Fasilitas Umum">Fasilitas Umum</option>
                  <option value="Fasilitas Parkir">Fasilitas Parkir</option>
                  <option value="Akses Lingkungan">Akses Lingkungan</option>
                </select>
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

<?php $this->load->view('admin/footer_fasilitas'); ?>