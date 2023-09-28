
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
                                            <!-- contr Pdenda->update -->
        <form method="post" action="<?= base_url()?>Pdenda/update" class="form-horizontal" >
            <div class="box-body">
                <div class="col-sm-6">
                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">ID Denda</label>
                    <div class="col-sm-10">
                        <input type="text" name="id_denda" value="<?= $data['id_denda'];?>" class="form-control" readonly>
                    </div>
                    </div>    

                    <div class="form-group">
                    <label for="rp_denda" class="col-sm-2 control-label">Rp Denda</label>
                    <div class="col-sm-10">
                        <input type="number" name="rp_denda" value="<?= $data['rp_denda'];?>" class="form-control" placeholder="Rp Denda" required>
                    </div>
                    </div>
                </div>

            </div>
              <!-- /.box-body -->
                <div class="box-footer">
                <!-- kembali di kontroler anggota -->
                    <a href="<?= base_url()?>Pdenda" class="btn btn-warning">Cancel</a> 
                    <button type="submit" class="btn btn-primary pull-right">Update</button>
                </div>
              <!-- /.box-footer -->
        </form>
        
    </div>
    <!-- /.box -->
</div>