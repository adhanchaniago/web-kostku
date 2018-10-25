<?php $this->load->view('pemilik/header'); ?>

  <div class="container-fluid">
  <ol class="breadcrumb">
    <li>
      <a href="<?php echo site_url('User') ?>">Kost</a>
    </li>
    <li class="active">Kamar</li>
  </ol>
    <div class="panel panel-default">
      <div class="panel-heading"> Daftar Kamar</div>
      <div class="panel-body">
        <input type="hidden" name="id_kost" id="id_kost" value="<?php echo $this->uri->segment(3) ?>">
        <div class="pull-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Tambah Kamar</a></div>
        <table class="table table-striped" id="mydata">
          <thead>
            <tr>
              <th>Ukuran</th>
              <th>Foto</th>
              <th>Harga</th>
              <th>Fasilitas</th>
              <th>Status</th>
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
  <form class="form-horizontal" id="addKamar">
    <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Tambah Kamar Baru</h4>
          </div>
          <div class="modal-body">
            <input type="hidden" name="id_k" id="id_k" class="form-control">
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Ukuran</label>
                <div class="col-md-10">
                  <input type="text" name="ukuran" id="ukuran" class="form-control" placeholder="Ukuran" required>
                </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Foto Kamar</label>
              <div class="col-md-10">
                <input type="file" name="file" id="file" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Harga</label>
                <div class="col-md-10">
                  <input type="text" name="harga" id="harga" class="form-control" placeholder="Harga" required>
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

  <!--MODAL SEWAKAN-->
    <form>
      <div class="modal fade" id="Modal_Sewakan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Sewakan Kamar</h4>
            </div>
            <div class="modal-body">
              <strong>Apakah anda yakin ingin menyewakan kamar tersebut?</strong>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="id_kamar_sewakan" id="id_kamar_sewakan" class="form-control">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
              <button type="button" type="submit" id="btn_sewakan" class="btn btn-primary">Yes</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  <!--END MODAL SEWAKAN-->

  <!--MODAL KOSONGKAN-->
    <form>
      <div class="modal fade" id="Modal_Kosongkan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Kosongkan Kamar</h4>
            </div>
            <div class="modal-body">
              <strong>Apakah anda yakin ingin mengosongkan kamar tersebut?</strong>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="id_kamar_kosongkan" id="id_kamar_kosongkan" class="form-control">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
              <button type="button" type="submit" id="btn_kosongkan" class="btn btn-primary">Yes</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  <!--END MODAL KOSONGKAN-->

  <!-- MODAL EDIT -->
  <form class="form-horizontal" id="editKamar">
    <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Edit Kamar</h4>
          </div>
          <div class="modal-body">
          <input type="hidden" name="id_kamar_edit" id="id_kamar_edit" class="form-control">
          <input type="hidden" name="lfoto" id="lfoto">
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Ukuran</label>
                <div class="col-md-10">
                  <input type="text" name="ukuran_edit" id="ukuran_edit" class="form-control" placeholder="Ukuran">
                </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Foto Kamar</label>
              <div class="col-md-10">
                <input type="file" name="file" id="file">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Harga</label>
                <div class="col-md-10">
                  <input type="text" name="harga_edit" id="harga_edit" class="form-control" placeholder="Harga">
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
              <h4 class="modal-title">Hapus Kamar</h4>
            </div>
            <div class="modal-body">
              <strong>Apakah Anda Yakin Ingin Menghapus Kamar Berikut?</strong>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="id_kamar_delete" id="id_kamar_delete" class="form-control">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
              <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  <!--END MODAL DELETE-->

<?php $this->load->view('pemilik/footerk'); ?>