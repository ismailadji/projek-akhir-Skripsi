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
                                <td>ID Anggota :</td>
                                <td><?= $data['id_anggota'];?></td>
                            </tr>

                            <tr>
                                <td>Foto Anggota :</td>
                                <td> <img src="<?= base_url()?>assets/image/anggota/<?= $data['foto_anggota'];?>" alt="" width="200"></td>
                            </tr>

                            <tr>
                                <td>NIS/NBM :</td>
                                <td><?= $data['nis'];?></td>
                            </tr>

                            <tr>
                                <td>Nama Anggota :</td>
                                <td><?= $data['nama'];?></td>
                            </tr>

                            <tr>
                                <td>Kelas/Jabatan :</td>
                                <td><?= $data['kelas'];?></td>
                            </tr>

                            <tr>
                                <td>Jenis Kelamin :</td>
                                <td><?= $data['jenkel'];?></td>
                            </tr>

                            <tr>
                                <td>Alamat :</td>
                                <td><?= $data['alamat'];?></td>
                            </tr>

                            <tr>
                                <td>Tanggal Lahir :</td>
                                <td><?= $data['tgl_lahir'];?></td>
                            </tr>

                            <tr>
                                <td>No Telepon :</td>
                                <td><?= $data['no_hp'];?></td>
                            </tr>

                            <tr>
                                <td>Email :</td>
                                <td><?= $data['email'];?></td>
                            </tr>

                            <tr>
                                <td>Username :</td>
                                <td><?= $data['username'];?></td>
                            </tr>

                            <tr>
                                <td>Password :</td>
                                <td type="password"><?= $data['password'];?></td>
                            </tr>

                            <tr>
                                <td>QR Anggota :</td>
                                <td>
                                <?php
                                    $no=1;  {?>
                                    <?php
                                        $kode = "|".$data['id_anggota']."|".$data['nis']."|".$data['nama']."|".$data['kelas']."|".$data['username']."|".$data['password']."|".$data['level']."";
                                        require_once('assets/phpqrcode/qrlib.php');
                                        QRcode::png("$kode","assets/image/anggota/QR_anggota/qr_ang".$no.".png","M", 6,2);
                                    ?>
                                    <img src="<?= base_url()?>assets/image/anggota/QR_anggota/qr_ang<?= $no ?>.png" alt="" width="90">
                                </td>
                                    <?php }
                                ?>    
                            </tr>

                            <tr>
                                <td>Level :</td>
                                <td><?= $data['level'];?></td>
                            </tr>

                            <tr>
                                <td>Tanggal Gabung:</td>
                                <td><?= $data['tgl_gabung'];?></td>
                            </tr>

                            <tr>
                                <td>Tanggal Terakhir Diubah:</td>
                                <td><?= $data['tgl_terakhir_ubah'];?></td>
                            </tr>
                            
                            
                        </table>
                        <!-- /.box-body -->
                        <div class="box-footer">
                        <!-- kembali di kontroler tam_user -->
                            <a href="<?= base_url()?>Tampilan_user/Tam_user" class="btn btn-warning">Cancel</a> 
                            
                        </div>
                    <!-- /.box-footer -->
                    </div>
                </div>
                
            </div>
        <!-- </div> -->
    </div>
