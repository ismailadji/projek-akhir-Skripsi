<?php
    if (!empty($this->session->flashdata('info'))) {?>
        <div class="alert alert-success" role="alert"><?= $this->session->flashdata('info');?></div>
    <?php }
?>

<div class="row">
    <div class="col-md-12">
        <a href="<?= base_url()?>Buku/tambah_buku" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Buku</a>
    </div>
</div>
<br>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Table List Buku</h3>
    </div>
    
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Buku</th>
                    <th>Sampul Buku</th>
                    <th>Judul</th>
                    <th>ISBN/ISSN</th>
                    <th>Pengarang</th>
                    <th>Jumlah</th>
                    <th>Tanggal Buku Masuk</th>
                    <th>Tanggal Perubahan Terakhir</th>
                    <th>QR Buku</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                   $no=1; foreach ($data as $row) {?>
                        <tr>
                            <td><?= $no++;?></td>
                            <td><?= $row->id_buku;?></td>
                            <td>
                                <img src="<?= base_url()?>assets/image/buku/<?= $row->gambar_buku;?>" alt="" width="90">
                            </td>
                            <td><?= $row->judul_buku;?></td>
                            <td><?= $row->isbn;?></td>
                            <td><?= $row->pengarang;?></td>
                            <td><?= $row->jumlah_buku;?></td>
                            <td><?= $row->tanggal_masuk;?></td>
                            <td><?= $row->tanggal_berubah;?></td>
                            <td>
                                 <?php
                                    $kode = "".$row->id_buku."|".$row->isbn."|".$row->judul_buku."|".$row->pengarang."|".$row->penerbit."|".$row->tahun_terbit."";
                                    require_once('assets/phpqrcode/qrlib.php');
                                    QRcode::png("$kode","assets/image/buku/QR_buku/qr_bk".$no.".png","M", 6,2);
                                ?>
                                <img src="assets/image/buku/QR_buku/qr_bk<?= $no ?>.png" alt="" width="90">
                            </td>
                            <td>
                                <a href="<?= base_url()?>Buku/detail/<?= $row->id_buku;?>" class="btn btn-info btn-xs">Detail</a>
                                <a href="<?= base_url()?>Buku/edit/<?= $row->id_buku;?>" class="btn btn-success btn-xs">Edit</a>
                                <a href="<?= base_url()?>Buku/hapus/<?= $row->id_buku;?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin mau manghapus ?');">Hapus</a>
                            </td>
                        </tr>
                    <?php }
                ?>
            </tbody>
        </table>
    </div>

</div>