<?php
    if (!empty($this->session->flashdata('info'))) {?>
        <div class="alert alert-success" role="alert"><?= $this->session->flashdata('info');?></div>
    <?php }
?>

<div class="row">
    <div class="col-md-12">
        <a href="<?= base_url()?>Lampiran/tambah_lampiran" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Lampiran</a>
    </div>
</div>
<br>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Table List Lampiran</h3>
    </div>
    
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Lampiran</th>
                    <th>Lampiran Buku</th>
                    <th>Tanggal Masuk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                   $no=1; foreach ($data as $row) {?>
                        <tr>
                            <td><?= $no++;?></td>
                            <td><?= $row->id_lampiran;?></td>
                            <td>
                                <?= $row->lampiran_buku;?><img src="<?= base_url()?>assets/image/buku/lampiran/<?= $row->lampiran_buku;?>" alt="">
                            </td>
                            <td><?= $row->tgl_masuk;?></td>
                            <td>
                                <a href="<?= base_url()?>Lampiran/unduh/<?= $row->id_lampiran;?>" class="btn btn-success btn-xs">Unduh</a>
                                <a href="<?= base_url()?>Lampiran/hapus/<?= $row->id_lampiran;?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin mau manghapus ?');">Hapus</a>
                            </td>
                        </tr>
                    <?php }
                ?>
            </tbody>
        </table>
    </div>

</div>