<?php $this->load->view('header_footer/header_admin');?>

<div class="container">
    <div id="mainn">
    
        <div class="panel panel-default">
            <div class="panel-heading"> 
                List Pertanyaan
                <button class="btn btn-success btn-xs float-sm-right" data-toggle="modal" data-target="#newQuest">New Question</button>
            </div>
            <div class="panel-body">
                <table class="table table-striped" id="example">
                    <thead>     
                        <th>User name</th>
                        <th>Pertanyaan</th>
                        <th>Mapel</th>
                        <th>Poin Hadiah</th>
                        <th>Tingkatan</th>
                        <th>tanggal</th>
                        <th>Detail</th>
                    </thead>

                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<!-- Modal  nesquestion-->
   <div class="modal fade" id="newQuest" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                
                <div class="modal-body">
                    <?php echo form_open_multipart('Admin/PertanyaanBaru');?>
                    <?php echo validation_errors(); ?>
                      <div class="form-group">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <br>
                        <label for="message-text" class="col-form-label">Ajukan Pertanyaan</label>
                        <textarea class="form-control" name="soal" rows="6" placeholder="Tulis pertanyaanmu di sini (pertanyaan simpel & jelas lebih cepat terjawab)"></textarea>
                      </div>
                      <br>
                        
                      <div class="form-group row">
                        <div class="col-xs-3">
                            <label for="message-text" class="col-form-label">Matapelajaran :</label>
                            <select class="form-control form-control-lg" name="mapel">
                                <?php foreach ($this->Helpmy_model->getmapel() as $key) {    ?>
                                        <option><?php echo $key->kategori?></option>
                                <?php }  ?>
                            </select>
                        </div>
                        <div class="col-xs-3">
                            <label for="message-text" class="col-form-label">Tingkatan :</label>
                            <select class="form-control form-control-lg" name="tingkatan">
                                <option>Umum</option>
                                <option>Sekolah Dasar</option>
                                <option>Sekolah Menegah Pertama</option>
                                <option>Sekolah Menegah Atas</option>
                            </select>
                        </div>
                        <div class="col-xs-2">
                            <label for="message-text" class="col-form-label">Poin Hadiah :</label>
                            <input class="form-control form-control-lg" type="text" name="poin" placeholder="Poin">
                        </div>
                      </div>
                      <div class="form-group row">
                            <div class="col-xs-3">
                                
                                <button type="submit" class="btn btn-default" style="background-color: #57B2F8;color: #FFFFFF;"><b>Buat Pertanyaan</b></button>
                            </div>  
                      </div>
                      <br>
                <?php echo form_close(); ?> 
                </div>
            </div>
        </div>
    </div> 


<?php $this->load->view('header_footer/footer_admin');?>