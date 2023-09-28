<?php
    if (!empty($this->session->flashdata('info'))) {?>
        <div class="alert alert-success" role="alert"><?= $this->session->flashdata('info');?></div>
    <?php }
?>

<div class="row">
    <div class="col-md-12">
        <a href="<?= base_url()?>anggota/tambah_anggota" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Anggota</a>
        <a href="<?= base_url()?>anggota/print" class="btn btn-info"><i class="fa fa-print"></i> Print Anggota</a>
    </div>
</div>
<br>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Table Anggota</h3>
    </div>
    
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Anggota</th>
                    <th>Foto</th>
                    <!-- <th>NIS/NBM</th> -->
                    <th>Nama Anggota</th>
                    <!-- <th>Kelas/Jabatan</th> -->
                    <!-- <th>Jenis Kelamin</th> -->
                    <!-- <th>Alamat</th> -->
                    <th>No. Telepon</th>
                    <th>Level</th>
                    <th>Tanggal Gabung</th>
                    <!-- <th>Tanggal Terakhir Diubah</th> -->
                    <th>QR Anggota</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                   $no=1; foreach ($data as $row) {?>
                        <tr>
                            <td><?= $no++;?></td>
                            <td><?= $row->id_anggota;?></td>
                            <td>
                                <img src="<?= base_url()?>assets/image/anggota/<?= $row->foto_anggota;?>" alt="" width="90">
                            </td>
                            <!-- <td><?= $row->nis;?></td> -->
                            <td><?= $row->nama;?></td>
                            <!-- <td><?= $row->kelas;?></td> -->
                            <!-- <td><?= $row->jenkel;?></td>
                            <td><?= $row->alamat;?></td> -->
                            <td><?= $row->no_hp;?></td>
                            <td><?= $row->level;?></td>
                            <td><?= $row->tgl_gabung;?></td>
                            <!-- <td><?= $row->tgl_terakhir_ubah;?></td> -->
                            <td>
                                <?php
                                    $kode = "|".$row->id_anggota."|".$row->nis."|".$row->nama."|".$row->kelas."|".$row->username."|".$row->password."|".$row->level."";
                                    require_once('assets/phpqrcode/qrlib.php');
                                    QRcode::png("$kode","assets/image/anggota/QR_anggota/qr_ang".$no.".png","M", 6,2);
                                ?>
                                <img src="assets/image/anggota/QR_anggota/qr_ang<?= $no ?>.png" alt="" width="90">
                            </td>
                            <td>
                                <a href="<?= base_url()?>Anggota/detail/<?= $row->id_anggota;?>" class="btn btn-info btn-xs">Detail</a>
                                <a href="<?= base_url()?>Anggota/edit/<?= $row->id_anggota;?>" class="btn btn-success btn-xs">Edit</a>
                                <a href="<?= base_url()?>Anggota/hapus/<?= $row->id_anggota;?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin mau manghapus ?');">Hapus</a>
                                <a href="<?= base_url()?>Anggota/cetak_kartu_ang/<?= $row->id_anggota;?>" class="btn btn-primary fa fa-print "> Cetak Kartu</a>
                            </td>
                        </tr>
                    <?php }
                ?>
            </tbody>
        </table>
    </div>

</div>
                