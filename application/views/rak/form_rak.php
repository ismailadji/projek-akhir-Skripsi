
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
                                            <!-- contr Rak->simpan -->
        <form method="post" action="<?= base_url()?>Rak/simpan"class="form-horizontal" >
            <div class="box-body">
                <div class="col-sm-6">
                    <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Id Rak</label>
                    <div class="col-sm-10">
                        <input type="text" name="id_rak" value="<?= $id_rak;?>" class="form-control" readonly>
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Nama Rak</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_rak" class="form-control" placeholder="Nama Rak" required>
                    </div>
                    </div>
                </div>

            </div>
              <!-- /.box-body -->
                <div class="box-footer">
                <!-- kembali di kontroler anggota -->
                    <a href="<?= base_url()?>Rak" class="btn btn-warning">Cancel</a> 
                    <button type="submit" class="btn btn-primary pull-right">Tambah</button>
                </div>
              <!-- /.box-footer -->
        </form>
        
    </div>
    <!-- /.box -->
</div>