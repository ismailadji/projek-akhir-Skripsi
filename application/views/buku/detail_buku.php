<?php
    if (!empty($this->session->flashdata('info'))) {?>
        <div class="alert alert-success" role="alert"><?= $this->session->flashdata('info');?></div>
    <?php }
?>


<div class="box">
    <div class="box-header">
        <h3 class="box-title">Detail Data Anggota</h3>
    </div>
    
    <!-- /.box-header -->

    <!-- <div class="container"> -->
        <div class="row">
            <div class="col-md-6">
                <div class="box-body">
                    <table class="table table-striped">
                        <tr>
                            <td>ID Buku :</td>
                            <td><?= $data['id_buku'];?></td>
                        </tr>

                        <tr>
                            <td>Sampul Buku :</td>
                            <td> <img src="<?= base_url()?>assets/image/buku/<?= $data['gambar_buku'];?>" alt="" width="200"></td>
                        </tr>

                        <tr>
                            <td>Judul Buku :</td>
                            <td><?= $data['judul_buku'];?></td>
                        </tr>

                        <tr>
                            <td>ISBN :</td>
                            <td><?= $data['isbn'];?></td>
                        </tr>

                        <tr>
                            <td>Kategori :</td>
                            <td><?= $data['id_kategori'];?></td>
                        </tr>

                        <tr>
                            <td>Rak :</td>
                            <td><?= $data['id_rak'];?></td>
                        </tr>

                        <tr>
                            <td>Pengarang :</td>
                            <td><?= $data['pengarang'];?></td>
                        </tr>

                        <tr>
                            <td>Penerbit :</td>
                            <td><?= $data['penerbit'];?></td>
                        </tr>

                        <tr>
                            <td>Tahun Terbit :</td>
                            <td><?= $data['tahun_terbit'];?></td>
                        </tr>

                        <tr>
                            <td>Jumlah Buku :</td>
                            <td><?= $data['jumlah_buku'];?></td>
                        </tr>

                        <tr>
                            <td>QR Buku :</td>
                            <td>
                            <?php
                                $no=1;  {?>
                                <?php
                                    $kode = "".$data['id_buku']."|".$data['isbn']."|".$data['judul_buku']."|".$data['pengarang']."|".$data['penerbit']."|".$data['tahun_terbit']."";
                                    require_once('assets/image/buku/QR_buku/phpqrcode/qrlib.php');
                                    QRcode::png("$kode","assets/image/buku/QR_buku/qr_bk".$no.".png","M", 6,2);
                                ?>
                                <img src="<?= base_url()?>assets/image/buku/QR_buku/qr_bk<?= $no ?>.png" alt="" width="90">
                            </td>
                                <?php }
                            ?>
                        </tr>

                        <tr>
                            <td>Tanggal Buku Masuk:</td>
                            <td><?= $data['tanggal_masuk'];?></td>
                        </tr>

                        <tr>
                            <td>Tanggal Perubahan Terakhir:</td>
                            <td><?= $data['tanggal_berubah'];?></td>
                        </tr>
                        
                        
                    </table>
                    <!-- /.box-body -->
                <div class="box-footer">
                <!-- kembali di kontroler anggota -->
                    <a href="<?= base_url()?>buku" class="btn btn-warning">Cancel</a> 
                </div>
              <!-- /.box-footer -->
                </div>
            </div>
        </div>
    <!-- </div> -->
</div>
        