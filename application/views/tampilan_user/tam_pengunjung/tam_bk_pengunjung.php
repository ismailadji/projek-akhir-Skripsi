<?php
  $tanggal = date('y-m-d');
?>

<div class="body">
<!--/.col (left) -->
<!-- right column -->
<div class="col-md-12">
    <!-- Horizontal Form -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Cara Isi Buku Pengunjung :</h3>
            <h5>1. Scan Qr Code yang ada pada Katu Anggota </h5>
            <h5>2. Jika tidak memiliki/membawa kartu bisa isi nama, kelas, dan keperluan di samping</h5>
            <h5>3. Terakhir klik kirim </h5>
        </div>

        <!-- /.box-header -->
        <!-- form start -->
                                            <!-- contr pengunjung->simpan -->
        <form method="post" action="<?= base_url()?>tampilan_user/tam_pengunjung/simpan" enctype="multipart/form-data" class="form-horizontal" >
            <div  id="app" class="box-body">

                <div class="col-sm-6">
                <!-- scan -->
                    <!-- <div id="app" class="row box"> -->
                        <div class="col-md-6 col-md-offset-4 sidebar">
                            <ul>
                                <li v-if="cameras.length === 0" class="empty">No cameras found</li>
                                <li v-for="camera in cameras">
                                <span v-if="camera.id == activeCameraId" :title="formatName(camera.name)" class="active"><input type="radio" class="align-middle mr-1" checked> {{ formatName(camera.name) }}</span>
                                <span v-if="camera.id != activeCameraId" :title="formatName(camera.name)">
                                    <a @click.stop="selectCamera(camera)"> <input type="radio" class="align-middle mr-1">@{{ formatName(camera.name) }}</a>
                                </span>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                            <!-- form scan buat menyambungkan scanernya -->
                            <form action="" method="POST" id="myForm">
                                <fieldset class="scheduler-border">
                                    <legend class="scheduler-border"> Form Scan QRcode </legend>
                                    <input type="text" name="qrcode" id="code" autofocus>
                                </fieldset>
                            </form>

                            <!-- untuk meriques data form -->
                            <?php

                                $host = 'localhost';
                                $name = 'root';
                                $dbname = 'perpustakaan_ua';
                                $dbpass = '';

                                $con = mysqli_connect($host,$name,$dbpass,$dbname);

                                if(!empty($_POST['qrcode'])){
                                    // password berdasarkan username dan pass
                                    // contoh |username|huidui7862761|

                                    $qrcode = $_POST['qrcode'];
                                    $array = explode('|', $qrcode); // fungsi php untuk memecah array tanda | untuk penanda

                                    $id_anggota = $array[1]; // 1 berasal dari array yang dimulai dari 0
                                    $nis = $array[2];
                                    $nama = $array[3];
                                    $kelas = $array[4];
                                    $username = $array[5];
                                    $password = $array[6];
                                    $level = $array[7];

                                    $sql = "SELECT * FROM anggota WHERE id_anggota = '$id_anggota' AND nis = '$nis' AND nama = '$nama' AND kelas = '$kelas' AND username = '$username' AND password = '$password' AND level = '$level'";
                                    $resultSQL = mysqli_query($con, $sql);
                                    $result = mysqli_fetch_array($resultSQL);

                                    if (mysqli_num_rows($resultSQL) > 0) {
                                        $_SESSION['nama'] = $result['nama'];
                                        $_SESSION['kelas'] = $result['kelas'];

                                        // Tampilkan data anggota
                                        echo "Nama Anggota: " . $result['nama'] . "<br>";
                                        echo "Kelas: " . $result['kelas'] . "<br>";                                                 
                                    }
                                }
                            ?>

                        </div>
                        <div class="col-xs-12 preview-container camera">
                            <video id="preview" class="thumbnail"></video>
                        </div>
                    <!-- </div> -->
                    <!-- scanner -->
                    </div>    

                    <div class="col-sm-6">
                        <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Kunjung</label>
                        <div class="col-sm-10">
                            <input type="text" name="tanggal_kunjung" value="<?= $tanggal;?>" class="form-control" placeholder="Created" readonly>
                        </div>
                        </div>

                        <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" value="<?= isset($_SESSION['nama']) ? $_SESSION['nama'] : ''; ?>" required>
                        </div>
                        </div>

                        <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Kelas/Jabatan</label>
                        <div class="col-sm-10">
                            <input type="text" name="kelas" class="form-control" placeholder="Masukan Kelas" value="<?= isset($_SESSION['kelas']) ? $_SESSION['kelas'] : ''; ?>" required>
                        </div>
                        </div>

                        <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Keperluan</label>
                        <div class="col-sm-10">
                        <textarea name="keperluan" class="form-control" placeholder="Masukan keperluan contoh: Pinjam buku" cols="30" rows="5" ></textarea>
                        </div>
                        </div>

                        <div>
                        <button type="submit" class="btn btn-primary pull-right">Kirim</button>
                        </div>
                    </div>

            </div>
              <!-- /.box-body -->
                <div class="box-footer">
                <!-- kembali di kontroler anggota -->
                    <a href="<?= base_url()?>tampilan_user/tam_pengunjung" class="btn btn-warning">Cancel</a> 
                    <!-- <button type="submit" class="btn btn-primary pull-right">Simpan</button> -->
                </div>
              <!-- /.box-footer -->
        </form>
    </div>
    <!-- /.box -->
</div>
</div>