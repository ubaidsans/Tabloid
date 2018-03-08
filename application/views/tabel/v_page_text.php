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
                                <th width="15%">Nama</th>
                                <th width="25%">Pembuka</th>
                                <th width="25%">Isi</th>
                                <th width="25%">Penutup</th>
                                <th width="5%"></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  
                            $i = 1;
                            foreach ($text as $row) {
                        ?>
                            <tr>
                                <td><?php echo $row->idtext; ?></td>
                                <td><?php echo $row->nama; ?></td>
                                <td><?php echo $row->pembuka; ?></td>
                                <td><?php echo $row->isi; ?></td>
                                <td><?php echo $row->penutup; ?></td>
                                <td></td>
                                
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

