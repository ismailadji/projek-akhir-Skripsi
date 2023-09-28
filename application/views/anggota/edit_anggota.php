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
                                            <!-- contr anggota-> fungcion update -->
        <form method="post" action="<?= base_url()?>Anggota/update" enctype="multipart/form-data" class="form-horizontal" >
            <div class="box-body">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Id Anggota</label>
                  <div class="col-sm-10">
                        <input type="text" name="id_anggota" value="<?= $data['id_anggota'];?>" class="form-control" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">NIS/NBM</label>
                  <div class="col-sm-10">
                        <input type="text" name="nis" value="<?= $data['nis'];?>" class="form-control" placeholder="Masukan NIS" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Nama Amggota</label>
                  <div class="col-sm-10">
                        <input type="text" name="nama" value="<?= $data['nama'];?>" class="form-control" placeholder="Masukan Nama Lengkap" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kelas/Jabatan</label>
                  <div class="col-sm-10">
                        <input type="text" name="kelas" value="<?= $data['kelas'];?>" class="form-control" placeholder="Masukan Kelas" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
                        <select name="jenkel" class="form-control" required>
                            <?php
                                if ($data['jenkel'] == "Laki-laki") {?>
                                    <option value="Laki-laki" selected>Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                <?php } else{?>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan" selected>Perempuan</option>
                                <?php }
                            ?>
                            
                        </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-10">
                        <textarea name="alamat" class="form-control" placeholder="Masukan Alamat" cols="30" rows="5" required><?= $data['alamat'];?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Lahir</label>
                  <div class="col-sm-10">
                        <input type="date" name="tgl_lahir" value="<?= $data['tgl_lahir'];?>" class="form-control" placeholder="Masukan Tanggal Lahir" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">No Telepon</label>
                  <div class="col-sm-10">
                        <input type="text" name="no_hp" value="<?= $data['no_hp'];?>" class="form-control" placeholder="Masukan No Telepon" required>
                  </div>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                        <input type="text" name="email" value="<?= $data['email'];?>" class="form-control" placeholder="Masukan Email" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                        <input type="text" name="username" value="<?= $data['username'];?>" class="form-control" placeholder="Username" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                        <input type="password" name="password" value="<?= $data['password'];?>" class="form-control" placeholder="Password" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Level</label>
                  <div class="col-sm-10">
                        <select name="level" class="form-control" required>
                            <?php if ($data['level'] == "Administrator") {?>
                                    <option value="Administrator" selected>Administrator</option>
                                    <option value="Siswa">Siswa</option>
                                    <option value="Guru">Guru</option>
                                <?php } else if ($data['level'] == "Siswa") {?>
                                    <option value="Administrator">Administrator</option>
                                    <option value="Siswa" selected>Siswa</option>
                                    <option value="Guru">Guru</option>
                                <?php } else {?>
                                    <option value="Administrator">Administrator</option>
                                    <option value="Siswa">Siswa</option>
                                    <option value="Guru" selected>Guru</option>
                                <?php }
                            ?>
                        </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Pas Foto</label>
                  <div class="col-sm-10">
                        <input type="file" name="foto_anggota" class="form-control" placeholder="Pas Foto">
                        <?php
                          if (!empty($data['foto_anggota'])) {?>
                          <br/>
                          <img src="<?= base_url()?>assets/image/anggota/<?= $data['foto_anggota'];?>" alt="" width="200">
                          <?php }else{
                            echo "Foto tidak ada";
                          }
                        ?>    
                  </div>
                </div> 

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Terakhir Diubah</label>
                  <div class="col-sm-10">
                        <input type="text" name="tgl_terakhir_ubah" value="<?= $tanggal;?>" class="form-control" placeholder="Tanggal Terakhir Diubah" readonly>
                  </div>
                </div>

              </div>
            </div>
              <!-- /.box-body -->
                <div class="box-footer">
                <!-- kembali di kontroler anggota -->
                    <a href="<?= base_url()?>anggota" class="btn btn-warning">Cancel</a> 
                    <button type="submit" class="btn btn-primary pull-right">Update</button>
                </div>
              <!-- /.box-footer -->
        </form>
    </div>
    <!-- /.box -->
</div>