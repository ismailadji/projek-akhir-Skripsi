<?php
    if (!empty($this->session->flashdata('info'))) {?>
        <div class="alert alert-success" role="alert"><?= $this->session->flashdata('info');?></div>
    <?php }
?>

<div class="row">
    <div class="col-md-12">
        <a href="<?= base_url()?>Kategori/tambah_kategori" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Kategori</a>
    </div>
</div>
<br>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Table List Kategori</h3>
    </div>
    
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Kategori</th>
                    <th>Kategori Buku</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                   $no=1; foreach ($data as $row) {?>
                        <tr>
                            <td><?= $no++;?></td>
                            <td><?= $row->id_kategori;?></td>
                            <td><?= $row->nama_kategori;?></td>
                            <td>
                                <a href="<?= base_url()?>kategori/hapus/<?= $row->id_kategori;?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin mau manghapus ?');">Hapus</a>
                            </td>
                        </tr>
                    <?php }
                ?>
            </tbody>
        </table>
    </div>

</div>