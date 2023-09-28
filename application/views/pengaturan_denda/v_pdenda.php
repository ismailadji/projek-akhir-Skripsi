<?php
    if (!empty($this->session->flashdata('info'))) {?>
        <div class="alert alert-success" role="alert"><?= $this->session->flashdata('info');?></div>
    <?php }
?>
<div class="col-md-8">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Tambah Harga Denda</h3>
        </div>
        <form method="post" action="<?= base_url()?>Pdenda/simpan" class="form-horizontal" >
            <div class="box-body">
                <div class="col-sm-8">
                            
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Harga Denda</label>
                            <div class="col-sm-10">
                                <input type="number" name="rp_denda" class="form-control" placeholder="Rp Denda" required>
                            </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right">Tambah</button>
                </div>
            <!-- /.box-footer -->
        </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <a href="<?= base_url()?>Pdenda/tambah_rpdenda" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Biaya Denda</a>
    </div>
</div>
<br>


<div class="box">
    <div class="box-header">
        <h3 class="box-title">Table Biaya Denda</h3>
    </div>
    
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Rp Denda</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                   $no=1; foreach ($data as $row) {?>
                        <tr>
                            <td><?= $no++;?></td>
                            <td><?= $row->rp_denda;?></td>
                            <td>
                                <a href="<?= base_url()?>Pdenda/edit/<?= $row->id_denda;?>" class="btn btn-success btn-xs">Edit</a>
                                <a href="<?= base_url()?>Pdenda/hapus/<?= $row->id_denda;?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin mau manghapus ?');">Hapus</a>
                            </td>
                        </tr>
                    <?php }
                ?>
            </tbody>
        </table>
    </div>

</div>