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
                                <th width="40%">Judul</th>
                                <th width="10%">Jumlah lihat</th>
                                <th width="10%">Jumlah like</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  
                            $i = 1;
                            foreach ($berita as $row) {
                        ?>
                            <tr>
                                <td><?php echo $row->id; ?></td>
                                <td><?php echo $row->judul; ?></td>
                                <td><?php echo $row->dibaca; ?></td>
                                <td><?php echo $row->love; ?></td>
                                
                            </tr>
                        <?php
                                $i++;
                            }
                        ?>
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</dl>

