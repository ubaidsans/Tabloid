<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"> <i class="fa fa-plus-square" style="margin-right: 10px"></i>Tambah Iklan</h4>
    </div>  
    <div class="modal-body">
        <?php echo form_open_multipart('cms/iklan/editproses');?>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-10 enter">
                            <input type="hidden" name="id" value="<?php echo $iklan[0]['id'];?>">
                            <label>Nama Iklan</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user" style="width: 15px"></i></span>
                                <input type="text" name="nama" value="<?php echo $iklan[0]['nama'];?>" class="form-control" placeholder="Nama Iklan" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 enter">
                            <label>Iklan</label>
                            
                            <div class="input-group">
                                <input type="file" name="userfile">     
                                <p class="help-block">Upload gambar iklan.</p>
                            </div>
                            <input type="text" name="nama" value="<?php echo $iklan[0]['gambar'];?>" disabled>
                        </div>
                    </div>    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php echo form_close();?>
</div>
</body>
</html>
