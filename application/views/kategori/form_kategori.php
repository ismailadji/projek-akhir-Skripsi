
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
                                            <!-- contr Kategori->simpan -->
        <form method="post" action="<?= base_url()?>Kategori/simpan" class="form-horizontal" >
            <div class="box-body">
                <div class="col-sm-6">
                    <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Id Kategori</label>
                    <div class="col-sm-10">
                        <input type="text" name="id_kategori" value="<?= $id_kategori;?>" class="form-control" readonly>
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Nama Kategori</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori" required>
                    </div>
                    </div>
                </div>

            </div>
              <!-- /.box-body -->
                <div class="box-footer">
                <!-- kembali di kontroler anggota -->
                    <a href="<?= base_url()?>Kategori" class="btn btn-warning">Cancel</a> 
                    <button type="submit" class="btn btn-primary pull-right">Tambah</button>
                </div>
              <!-- /.box-footer -->
        </form>
        
    </div>
    <!-- /.box -->
</div>