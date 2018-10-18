<?php $this->load->view('header_footer/header_admin');?>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading"> 
            List MataPelajaran
            <a class="btn btn-success btn-xs float-sm-right" data-toggle="modal" href='#modal-id'>Mapel Baru</a>
        </div>
        <div class="panel-body">
            <table class="table table-striped" id="mapel_lst">
                <thead>     
                    <th>icon</th>
                    <th>Matapelajaran</th>
                    <th>Priority</th>
                    <th>Edit</th>
                </thead>

                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="modal-id">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <?php echo form_open_multipart('Admin/mapel_add');?>
            <div class="modal-body">
                    <legend>Edit Mapel</legend>
                    <div class="flex-row">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

                            <img class="img-rounded" height="200" src="<?=base_url()?>img/noimage.png">
                            <br>
                            <input type="file" class="form-control" name="fotobaru" required>
                            <br><br>
                            
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <label for="">Mata Pelajaran</label>
                            <input type="text" name="mapel" class="form-control" value="" required>
                            <label>Priority</label>
                            <input type="text" name="Priority" class="form-control" value="" required>
                        </div>
                        
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
             <?php echo form_close(); ?> 
        </div>
    </div>
</div>

<?php $this->load->view('header_footer/footer_admin');?>