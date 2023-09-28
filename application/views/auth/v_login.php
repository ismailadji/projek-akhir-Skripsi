    <div class="body">
        <!-- <div class="login-box"> -->
        <div class="box_tengah">
            <div class="login-logo">
                <!-- <b>Login</b> Login Sistem Perpustakaan UA -->
            </div>

            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg login">Login Sistem Perpustakaan UA</p>

                <!-- login dengan scan -->
                <div id="app" class="row box">
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
                            <legend class="scheduler-border"> Form Scan </legend>
                            <input type="text" name="qrcode" id="code" autofocus readonly>
                        </fieldset>
                    </form>

                        <!-- untuk meriques data form -->
                        <?php

                            $host = 'localhost';
                            $name = 'root';
                            $dbname = 'perpustakaan_ua';
                            $dbpass = '';

                            $con = mysqli_connect($host,$name,$dbpass,$dbname);

                        // $con = $this->db->get('anggota');//nama tabel db
                            if(!empty($_POST['qrcode'])){
                                // password berdasarkan username dan pass
                                // |username|huidui7862761|

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

                                if (mysqli_num_rows($resultSQL) > 0 ) {

                                    $_SESSION['username'] = $result['username'];
                                    $_SESSION['level'] = $result['level'];

                                    // redirect('dashboard');
                                    if ($level == 'Administrator') {
                                        redirect('dashboard');
                                    } elseif ($level == 'Siswa') {
                                        redirect('tampilan_user/dashboard_user');
                                    }
                                }
                            }
                        ?>

                    </div>
                    <div class="col-xs-12 preview-container camera">
                        <video id="preview" class="thumbnail"></video>
                    </div>
                </div>
                <!-- scanner -->

                <!-- login pakai username dan password -->
                <?= $this->session->flashdata('info');?>

                <form action="<?= base_url()?>auth/proses_login" method="post">
                
                <div class="form-group has-feedback">
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password" required> 
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <!-- <div class="form-group has-feedback">
                    <select type="text" class="form-control" placeholder="Level" id="level" name="level" required>
                        <option value="">- Pilih Status - </option>
                        <option value="Administrator">Administrator</option>
                        <option value="Guru">Guru</option>
                        <option value="Siswa">Siswa</option>
                    </select>
                </div> -->

                <div class="row">
                    <div class="col-xs-8">
                    
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                    </div>
                    <!-- /.col -->
                </div>
                </form>

                <d>Belum punya Akun ?</d>
                <a href="<?= base_url()?>Auth/registrasi" class="text-center">Registrasi</a>

            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->
    </div>

       