
<!--/.col (left) -->
<!-- right column -->
<div class="col-md-12">
    <!-- Horizontal Form -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><?= $judul;?></h3>
        </div>

        <!-- /.box-header -->
        <!-- form start -->
                                            <!-- contr Pdenda->simpan -->
        <form method="post" action="<?= base_url()?>Pdenda/simpan" class="form-horizontal" >
            <div class="box-body">
                <div class="col-sm-6">
                    
                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Rp Denda</label>
                    <div class="col-sm-10">
                        <input type="number" name="rp_denda" class="form-control" placeholder="Rp Denda" required>
                    </div>
                    </div>
                </div>

            </div>
              <!-- /.box-body -->
                <div class="box-footer">
                <!-- kembali di kontroler anggota -->
                    <button type="submit" class="btn btn-primary pull-right">Tambah</button>
                </div>
              <!-- /.box-footer -->
        </form>
        
    </div>
    <!-- /.box -->
</div>