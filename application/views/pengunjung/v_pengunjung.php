<?php
    if (!empty($this->session->flashdata('info'))) {?>
        <div class="alert alert-success" role="alert"><?= $this->session->flashdata('info');?></div>
    <?php }
?>

<?php
  $tanggal = date('y-m-d');
?>

<div class="box-header with-border">
            <h3 class="box-title">Cara Isi Buku Pengunjung :</h3>
            <h5>1. Klik button Isi Buku Pengunjung </h5>
            <h5>2. Selanjutnya Scan Qr Code yang ada pada Katu Anggota </h5>
            <h5>3. Jika tidak memiliki atau tidak membawa kartu bisa mengisi secara manual nama, kelas, dan keperluan kalian</h5>
            <h5>4. Terakhir klik kirim </h5>
        </div>

<div class="row">
    <div class="col-md-12">
        <a href="<?= base_url()?>Pengunjung/isi_pengunjung" class="btn btn-success"><i class="fa fa-plus"></i> Isi Buku Pengunjung</a>
    </div>
</div>
<br>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Table List Pengunjung</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <!-- <th>Id Pengunjung</th> -->
                    <th>Tanggal Kunjung</th>
                    <th>Nama</th>
                    <th>Kelas/Jabatan</th>
                    <th>Keperluan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                   $no=1; foreach ($data as $row) {?>
                        <tr>
                            <td><?= $no++;?></td>
                            <!-- <td><?= $row->id_pengunjung;?></td> -->
                            <td><?= $row->tanggal_kunjung;?></td>
                            <td><?= $row->nama;?></td>
                            <td><?= $row->kelas;?></td>
                            <td><?= $row->keperluan;?></td>
                            <td>
                                <a href="<?= base_url()?>Pengunjung/hapus/<?= $row->id_pengunjung;?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin mau manghapus ?');">Hapus</a>
                            </td>
                        </tr>
                    <?php }
                ?>
            </tbody>
        </table>
    </div>

</div>