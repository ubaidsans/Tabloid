<dl class="dl-horizontal">
    <div class="row">
        <div class="col-xs-12">                            
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data Berita <span class="label label-primary" style="font-size:12px; padding-top:4px; padding-bottom:4px">Semua Admin</span></h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="tabel" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="5%">No.</th>
                                <th width="30%">Nama</th>
                                <th width="50%">Gambar</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach( $iklan as $row ){
                                    echo "<td>".$row->id."</td>";
                                    echo "<td>".$row->nama."</td>";
                                    echo "<td>"."<img src='".base_url('assets/img/iklan/').$row->gambar."'width = '100%'>"."</td>";
                                    echo '<td>';?>
                                    
                                    
                                    <button id="edit" onclick="edit(<?php echo $row->id+0;?>)" class="btn btn-primary"> <i class="fa fa-edit" title="Edit"></i> </button>
                                    <a class="btn btn-danger btn-sm" href="javascript:$('#myModal2 .modal-content').load('<?php echo base_url(); ?>program/c_m_program/c_modal_hapus_kategori/<?php echo $row->id; ?>',function(e){$('#myModal2').modal('show');});"><i style="padding-left: 2px; padding-right: 2px" class="fa fa-trash-o" title="Hapus"></i></a>
                                <?php }
                            ?>
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        <div class="col-xs-12">
            <button id="tambah" class="btn btn-primary"> Tambah Iklan </button></div>
        </div>
        <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width:95%">
                <div class="modal-content" >            

                </div>
            </div>
        </div>
    </div>
</dl>

