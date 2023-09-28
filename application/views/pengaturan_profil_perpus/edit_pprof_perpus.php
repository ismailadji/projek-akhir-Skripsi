<!--/.col (left) -->
<!-- right column -->
<div class="col-md-12">
    <!-- Horizontal Form -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Profil Perpustakaan</h3>
        </div>

        <!-- /.box-header -->
        <!-- form start -->
                                            <!-- contr Prof_perpus->upadate -->
        <form method="post" action="<?= base_url()?>Pprof_perpus/update" class="form-horizontal" >
            <div class="box-body">
                <div class="col-sm-8">

                    <div class="form-group">
                    <!-- <label for="inputEmail3" class="col-sm-2 control-label">Id Profil</label> -->
                    <div class="col-sm-10">
                            <input type="hidden" name="id_profil_perpus" value="<?= $profil['id_profil_perpus']; ?>" class="form-control" readonly>
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Nama Aplikasi</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_apk" value="<?= $profil['nama_apk']; ?>" class="form-control" placeholder="Email" required>
                    </div>
                    </div>
    
                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Alamat Lengkap</label>
                    <div class="col-sm-10">
                        <input type="text" name="alamat_smp" value="<?= $profil['alamat_smp']; ?>" class="form-control" placeholder="Email" required>
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" name="email_smp" value="<?= $profil['email_smp']; ?>" class="form-control" placeholder="Email" required>
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">No Telepon</label>
                    <div class="col-sm-10">
                        <input type="text" name="no_tlp_smp" value="<?= $profil['no_tlp_smp']; ?>" class="form-control" placeholder="No Telepon" required>
                    </div>
                    </div>

                </div>

            </div>
              <!-- /.box-body -->
                <div class="box-footer">
                    <a href="<?= base_url()?>Pprof_perpus" class="btn btn-warning">Kembali</a>
                    <button type="submit" class="btn btn-primary pull-right">Update</button>
                </div>
              <!-- /.box-footer -->
        </form>
        
    </div>
    <!-- /.box -->
</div>
