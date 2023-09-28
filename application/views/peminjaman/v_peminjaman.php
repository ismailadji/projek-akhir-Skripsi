<?php
    if (!empty($this->session->flashdata('info'))) {?>
        <div class="alert alert-success" role="alert"><?= $this->session->flashdata('info');?></div>
    <?php }
?>

<div class="row">
    <div class="col-md-12">
        <a href="<?= base_url()?>Peminjaman/tambah_peminjaman" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Peminjaman</a>
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
                    <th>Id Peminjaman</th>
                    <th>Nama Peminjam</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($data as $row) {
                        $tanggal_kembali = new DateTime($row->tanggal_kembali);
                        $tanggal_sekarang = new DateTime();
                        $selisih = $tanggal_sekarang->diff($tanggal_kembali)->format("%a");

                        // Mengambil data buku yang dipinjam untuk setiap peminjaman
                        $buku_dipinjam = $this->m_peminjaman->getBukuDipinjam($row->id_peminjaman);
                        ?>
                        <tr>
                            <td><?= $row->id_peminjaman;?></td>
                            <td><?= $row->nama;?></td>
                            <td><?= $row->judul_buku;?></td>
                            <td><?= $row->tanggal_pinjam;?></td>
                            <td><?= $row->tanggal_kembali;?></td>
                            <!-- <td><?= $row->jumlah_pinjam;?></td> -->
                            <td>
                                <?php
                                    if ($tanggal_kembali >= $tanggal_sekarang OR $selisih == 0) {
                                        echo "<span class='label label-warning'>Belum di Kembalikan</span>";
                                    }else{
                                        echo "Telat <b style = 'color:red;'>".$selisih."</b> Hari <br> <span class='label label-danger'> Denda Perhari = 500";
                                    }
                                ?>
                            </td>
                            <td>
                                <a href="<?= base_url()?>Peminjaman/kembalikan/<?= $row->id_peminjaman;?>" class="btn btn-primary btn-xs" onclick="return confirm('Yakin Mau mengembalikan Buku ini ?');">Kembalikan</a>
                                <a href="<?= base_url()?>'Peminjaman/detailpinjam/<?= $row->id_peminjaman;?>" class="btn btn-primary btn-sm" title="Detail Pinjam"><i class="fa fa-eye"></i></button></a>
                                <a href="<?= base_url()?>Peminjaman/hapus/<?= $row->id_peminjaman;?>" class="btn btn-danger btn-sm" title="hapus pinjam" onclick="return confirm('Yakin mau manghapus ?');"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php }
                ?>
            </tbody>
        </table>
    </div>

</div>