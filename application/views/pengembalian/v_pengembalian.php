
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
                    <th>Nama Peminjam</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Tanggal di Kembalikan</th>
                    <!-- <th>Jumlah Peminjaman</th> -->
                    <th>Denda</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    foreach ($data as $row) {?>
                        <tr>
                            <td><?= $no++;?></td>
                            <td><?= $row->nama;?></td>
                            <td><?= $row->judul_buku;?></td>
                            <td><?= $row->tanggal_pinjam;?></td>
                            <td><?= $row->tanggal_kembali;?></td>
                            <td><?= $row->tanggal_kembalikan;?></td>
                            <!-- <td><?= $row->jumlah_pinjam;?></td> -->
                            <td><?= $row->denda;?></td>
                            <td>
                                <a href="<?= base_url()?>pengembalian/hapus/<?= $row->id_pengembalian;?>" class="btn btn-danger btn-sm" title="hapus" onclick="return confirm('Yakin mau manghapus ?');"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                   <?php }
                ?>
            </tbody>
        </table>
    </div>

</div>