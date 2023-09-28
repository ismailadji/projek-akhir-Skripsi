<?php
  $tanggal = date('y-m-d');
?>

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
                                            <!-- contr buku->simpan -->
        <form method="post" action="<?= base_url()?>Lampiran/simpan" enctype="multipart/form-data" class="form-horizontal" >
            <div class="box-body">
                <div class="col-sm-6">
                    <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Id Lampiran</label>
                    <div class="col-sm-10">
                        <input type="text" name="id_lampiran" value="<?= $id_lampiran;?>" class="form-control" readonly>
                    </div>
                    </div>    

                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Lampiran Buku <small style="color:green">(pdf) * opsional</small></label>
                    <div class="col-sm-10">
                        <input type="file" name="lampiran_buku" class="form-control" placeholder="Lampiran Buku">
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Masuk lampiran</label>
                    <div class="col-sm-10">
                        <input type="text" name="tgl_masuk" value="<?= $tanggal;?>" class="form-control" placeholder="Tanggal Masuk Buku" readonly>
                    </div>
                    </div>
                </div>

            </div>
              <!-- /.box-body -->
                <div class="box-footer">
                <!-- kembali di kontroler anggota -->
                    <a href="<?= base_url()?>Lampiran" class="btn btn-warning">Cancel</a> 
                    <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                </div>
              <!-- /.box-footer -->
        </form>
    </div>
    <!-- /.box -->
</div>