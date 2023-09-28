<?php
  $tanggal = date('y-m-d');
?>

<div class="body">
    <div class="box_tengah">
        <div class="register-box">
            <div class="register-logo">
                <!-- <a><b>Registrasi</b> Daftar Anggota</a> -->
            </div>

            <div class="register-box-body">
                <p class="login-box-msg login"><b>Registrasi</b></p>

                <form action="<?= base_url('auth/registrasi');?>" method="post" enctype="multipart/form-data">
        
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="ID Anggota" id="id_anggota" name="id_anggota" value="<?= $id_anggota;?>" readonly>
                    </div>

                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Masukan NIS/NBM" id="nis" name="nis" required>
                        <span class="fa fa-pencil form-control-feedback"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Masukan Nama Lengkap" id="nama" name="nama" required>
                        <span class="fa fa-pencil-square-o form-control-feedback"></span>
                    </div>
                    
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Masukan Kelas/Jabatan" id="kelas" name="kelas" required>
                        <span class="fa fa-mortar-board form-control-feedback"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <input type="date" class="form-control" placeholder="Masukan Tanggal Lahir" id="tgl_lahir" name="tgl_lahir" required>
                    </div>

                    <div class="form-group has-feedback">
                        <select class="form-control" placeholder="Masukan Jenis Kelamin" id="jenkel" name="jenkel" required>
                            <option value="">- Pilih Jenis Kelamin - </option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Masukan Alamat" id="alamat" name="alamat" required>
                        <span class="fa  fa-map form-control-feedback"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Masukan No Telepon" id="no_hp" name="no_hp" required>
                        <span class="fa fa-phone form-control-feedback"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" placeholder="Masukan Email" id="email" name="email" required>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                
                    <div class="form-group has-feedback">
                        <input type="file" class="form-control" placeholder="Foto" id="foto_anggota" name="foto_anggota" >
                        <span class="fa fa-picture-o form-control-feedback"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <select type="text" class="form-control" placeholder="Level" id="level" name="level" required>
                            <option value="">- Pilih Status - </option>
                            <!-- <option value="Administrator">Administrator</option> -->
                            <option value="Guru">Guru</option>
                            <option value="Siswa">Siswa</option>
                        </select>
                    </div>

                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Masukan Username" id="username" name="username" required>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Masukan Password" id="password" name="password" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Tanggal Gabung" id="tgl_gabung" name="tgl_gabung" value="<?= $tanggal;?>" readonly>
                        <span class="fa fa-calendar form-control-feedback"></span>
                    </div>


                <div class="row">
                    <div class="col-xs-8">
                    
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Registrasi</button>
                    </div>
                    <!-- /.col -->
                </div>
                </form>

                <a href="<?= base_url()?>Auth" class="text-center">Saya sudah memiliki keanggotaan</a>
            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.register-box -->
    </div>
</div>