<?php
  $tanggal = date('y-m-d');
?>

<!--/.col (left) -->
<!-- right column -->
<div class="col-md-12">
    <!-- Horizontal Form -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><?= $judul;?></h3>
        </div>

        <!-- /.box-header -->
        <!-- form start -->
                                            <!-- contr anggota->simpan -->
        <form method="post" action="<?= base_url()?>Anggota/simpan" enctype="multipart/form-data" class="form-horizontal" >
            <div class="box-body">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Id Anggota</label>
                  <div class="col-sm-10">
                        <input type="text" name="id_anggota" value="<?= $id_anggota;?>" class="form-control" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">NIS/NBM</label>
                  <div class="col-sm-10">
                        <input type="text" name="nis" class="form-control" placeholder="Masukan NIS/NBM" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Nama Lengkap</label>
                  <div class="col-sm-10">
                        <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Lengkap" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kelas/Jabatan</label>
                  <div class="col-sm-10">
                        <input type="text" name="kelas" class="form-control" placeholder="Masukan Kelas/Jabatan" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
                        <select name="jenkel" class="form-control" required>
                            <option value="">- Pilih Jenis Kelamin - </option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-10">
                      <textarea name="alamat" class="form-control" placeholder="Masukan Alamat" cols="30" rows="5" required></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Lahir</label>
                  <div class="col-sm-10">
                        <input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">No Telepon</label>
                  <div class="col-sm-10">
                        <input type="text" name="no_hp" class="form-control" placeholder="Masukan No Telepon" required>
                  </div>
                </div>
              </div>


              <div class="col-sm-6">
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                        <input type="text" name="email" class="form-control" placeholder="Masukan Email" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Level</label>
                  <div class="col-sm-10">
                        <select name="level" class="form-control" required>
                            <option value="">- Pilih Level - </option>
                            <option value="Administrator">Administrator</option>
                            <option value="Guru">Guru</option>
                            <option value="Siswa">Siswa</option>
                        </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Pas Foto</label>
                  <div class="col-sm-10">
                        <input type="file" name="foto_anggota" class="form-control" placeholder="Pas Foto">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Gabung</label>
                  <div class="col-sm-10">
                        <input type="text" name="tgl_gabung" value="<?= $tanggal;?>" class="form-control" placeholder="Created" readonly>
                  </div>
                </div>
                
              </div>
            </div>
              <!-- /.box-body -->
                <div class="box-footer">
                <!-- kembali di kontroler anggota -->
                    <a href="<?= base_url()?>anggota" class="btn btn-warning">Cancel</a> 
                    <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                </div>
              <!-- /.box-footer -->
        </form>
    </div>
    <!-- /.box -->
</div>