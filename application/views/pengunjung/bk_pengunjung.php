
<?php
    $tanggal = date('y-m-d');

    // Mendapatkan hasil scan QR code
    $hasilScanQRCode = '<?php echo isset($result) ? $result : ""; ?>';
    
    // Deklarasi variabel untuk menyimpan nilai nama dan kelas
    $namaQRCode = '';
    $kelasQRCode = '';
    
    // Jika hasil scan QR code tidak kosong
    if (!empty($hasilScanQRCode)) {
        // Mendapatkan data nama dan kelas dari hasil scan QR code
        $dataQRCode = explode('|', $hasilScanQRCode);
        if (isset($dataQRCode[3])) {
            $namaQRCode = $dataQRCode[3];
        } else {
            $namaQRCode = ''; // Atau dapat ditentukan nilai default lainnya
        }
        if (isset($dataQRCode[4])) {
            $kelasQRCode = $dataQRCode[4];
        } else {
            $kelasQRCode = ''; // Atau dapat ditentukan nilai default lainnya
        }
    }
?>

<script src="<?= base_url()?>assets/https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<script src="<?= base_url()?>assets/https://unpkg.com/vue-web-cam"></script>


<div class="body">
    <div class="col-md-12">
        <div class="box box-info">
                                                <!-- contr pengunjung->simpan -->
            <form method="post" action="<?= base_url()?>Pengunjung/simpan" enctype="multipart/form-data" class="form-horizontal" id="myForm">
                <div  id="app" class="box-body">

                    <div class="col-sm-6">
                        <!-- scan -->
                        <!-- <div class="col-md-6 col-md-offset-4 sidebar">
                            <ul>
                                <li v-if="cameras.length === 0" class="empty">No cameras found</li>
                                <li v-for="camera in cameras">
                                    <span v-if="camera.id == activeCameraId" :title="formatName(camera.name)" class="active">
                                        <input type="radio" class="align-middle mr-1" checked> {{ formatName(camera.name) }}
                                    </span>
                                    <span v-if="camera.id != activeCameraId" :title="formatName(camera.name)">
                                        <a @click.stop="selectCamera(camera)"><input type="radio" class="align-middle mr-1">@{{ formatName(camera.name) }}</a>
                                    </span>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                                <form action="" method="POST" id="myForm">
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border"> Form Scan </legend>
                                        <input type="text" name="qrcode" id="code" autofocus readonly>
                                    </fieldset>
                                </form>
                                
                            
                            </div>
                            <div class="col-xs-12 preview-container camera">
                                <video id="preview" class="thumbnail"></video>
                            </div> -->

                            <div class="col-md-6 col-md-offset-4 sidebar">
                                <ul>
                                    <li v-if="cameras.length === 0" class="empty">No cameras found</li>
                                    <li v-for="camera in cameras">
                                        <span v-if="camera.id == activeCameraId" :title="formatName(camera.name)" class="active">
                                            <input type="radio" class="align-middle mr-1" checked> {{ formatName(camera.name) }}
                                        </span>
                                        <span v-if="camera.id != activeCameraId" :title="formatName(camera.name)">
                                            <a @click.stop="selectCamera(camera)"><input type="radio" class="align-middle mr-1">@{{ formatName(camera.name) }}</a>
                                        </span>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                                <!-- form scan buat menyambungkan scanernya -->
                                <fieldset class="scheduler-border">
                                    <legend class="scheduler-border"> Form Scan </legend>
                                    <input type="hidden" name="qrcode" id="code" autofocus readonly>
                                </fieldset>
                                
                                <!-- untuk memeriksa data form -->
                                <?php
                                    $qrcode_data = $this->input->post('qrcode');
                                    if (!empty($qrcode_data)) {
                                        $qrcode_array = explode('|', $qrcode_data);
                                        if (count($qrcode_array) >= 8) {
                                            $id_anggota = $qrcode_array[1];
                                            $nis = $qrcode_array[2];
                                            $nama = $qrcode_array[3];
                                            $kelas = $qrcode_array[4];
                                            $username = $qrcode_array[5];
                                            $password = $qrcode_array[6];
                                            $level = $qrcode_array[7];

                                            $sql = "SELECT * FROM anggota WHERE id_anggota = '$id_anggota' AND nis = '$nis' AND nama = '$nama' AND kelas = '$kelas' AND username = '$username' AND password = '$password' AND level = '$level'";
                                            $resultSQL = $this->db->query($sql)->row_array();

                                            if ($resultSQL) {
                                                $_SESSION['nama'] = $resultSQL['nama'];
                                                $_SESSION['kelas'] = $resultSQL['kelas'];
                                            }
                                        }
                                    }
                                ?>
                            </div>
                            <div class="col-xs-12 preview-container camera">
                                <video id="preview" class="thumbnail"></video>
                            </div>

                    </div>    

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Kunjung</label>
                                <div class="col-sm-10">
                                    <input type="text" name="tanggal_kunjung" value="<?= $tanggal; ?>" class="form-control" placeholder="Created" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required value="<?= isset($nama) ? $nama : '' ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Kelas/Jabatan</label>
                                <div class="col-sm-10">
                                    <input type="text" name="kelas" class="form-control" placeholder="Masukan Kelas/Jabatan" required value="<?= isset($kelas) ? $kelas : '' ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Keperluan</label>
                                <div class="col-sm-10">
                                    <textarea name="keperluan" class="form-control" placeholder="Masukan keperluan contoh: Pinjam buku" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                            
                            <div>
                                <button type="submit" class="btn btn-primary pull-right">Kirim</button>
                            </div>
                        </div>
                </div>
                    <div class="box-footer">
                        <a href="<?= base_url()?>pengunjung" class="btn btn-warning">Cancel</a> 
                        
                    </div>
            </form>
        </div>
    </div>
    <script> 
        // Mendapatkan hasil scan QR code
        var hasilScanQRCode = '<?php echo isset($result) ? $result : ""; ?>';
        
        // Jika hasil scan QR code tidak kosong
        if (hasilScanQRCode !== '') {
            // Mendapatkan data nama dan kelas dari hasil scan QR code
            var data = hasilScanQRCode.split('|');
            var nama = data[3];
            var kelas = data[4];
            
            // Mengisi nilai data nama dan kelas ke dalam input fields pada form
            document.getElementsByName("nama")[0].value = nama;
            document.getElementsByName("kelas")[0].value = kelas;
        }
    </script>
</div>
