<?php
    if (!empty($this->session->flashdata('info'))) {?>
        <div class="alert alert-success" role="alert"><?= $this->session->flashdata('info');?></div>
    <?php }
?>

<div class="row">
    <div class="col-md-12">
        <a href="<?= base_url()?>Rak/tambah_rak" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Rak</a>
    </div>
</div>
<br>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Table List Rak</h3>
    </div>
    
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Rak</th>
                    <th>Nama Rak Buku</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                   $no=1; foreach ($data as $row) {?>
                        <tr>
                            <td><?= $no++;?></td>
                            <td><?= $row->id_rak;?></td>
                            <td><?= $row->nama_rak;?></td>
                            <td>
                                <a href="<?= base_url()?>rak/hapus/<?= $row->id_rak;?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin mau manghapus ?');">Hapus</a>
                            </td>
                        </tr>
                    <?php }
                ?>
            </tbody>
        </table>
    </div>

</div>