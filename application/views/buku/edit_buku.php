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
                                            <!-- contr buku->simpan -->
        <form method="post" action="<?= base_url()?>Buku/update" enctype="multipart/form-data" class="form-horizontal" >
            <div class="box-body">
                <div class="col-sm-6">
                    <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Id Buku</label>
                    <div class="col-sm-10">
                        <input type="text" name="id_buku" value="<?= $data['id_buku'];?>" class="form-control" readonly>
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Judul Buku</label>
                    <div class="col-sm-10">
                        <input type="text" name="judul_buku" value="<?= $data['judul_buku'];?>" class="form-control" placeholder="Masukan Judul Buku" required>
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">ISBN/ISSN</label>
                    <div class="col-sm-10">
                        <input type="text" name="isbn" value="<?= $data['isbn'];?>" class="form-control" placeholder="Masukan ISBN/ISSN" required>
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Kategori Buku</label>
                    <div class="col-sm-10">
                        <select name="id_kategori" class="form-control select2" required>
                            <?php 
                                foreach($kategori as $row) {
                                    if ($data['nama_kategori'] == $row->nama_kategori) {?>
                                        <option value="<?= $row->nama_kategori?>" selected> <?= $row->nama_kategori;?> </option>
                                    <?php }else{?>
                                        <option value="<?= $row->nama_kategori?>"> <?= $row->nama_kategori;?></option>
                                    <?php }
							    }
                            ?>
                        </select>
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Rak Buku</label>
                    <div class="col-sm-10">
                        <select name="id_rak" class="form-control select2" required>
                        <?php 
                                foreach($rak as $row) {
                                    if ($data['nama_rak'] == $row->nama_rak) {?>
                                        <option value="<?= $row->nama_rak?>" selected> <?= $row->nama_rak;?></option>
                                    <?php }else{?>
                                        <option value="<?= $row->nama_rak?>"> <?= $row->nama_rak;?></option>
                                    <?php }
							    }
                            ?>
                        </select>
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Nama Pengarang</label>
                    <div class="col-sm-10">
                        <input type="text" name="pengarang" value="<?= $data['pengarang'];?>" class="form-control" placeholder="Masukan Nama Pengarang" required>
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Nama Penerbit</label>
                    <div class="col-sm-10">
                        <input type="text" name="penerbit" value="<?= $data['penerbit'];?>" class="form-control" placeholder="Masukan Nama Penerbit" required>
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Tahun Terbit</label>
                    <div class="col-sm-10">
                        <select name="tahun_terbit" class="form-control select2" required>
                            <option value=""> - Pilih Tahun - </option>
                            <?php 
                                for($tahun = 2000; $tahun<= 2025; $tahun++){
                                    if ($data['tahun_terbit'] == $tahun) {?>
                                        <option value="<?= $tahun;?>" selected> <?= $tahun;?></option>
                                    <?php }else{?>
                                        <option value="<?= $tahun;?>"> <?= $tahun;?></option>
                                    <?php }
                                }
                            ?>
                        </select>
                    </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Jumlah Buku</label>
                    <div class="col-sm-10">
                        <input type="text" name="jumlah_buku" value="<?= $data['jumlah_buku'];?>" class="form-control" placeholder="Masukan Jumlah Buku" required>
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Sampul Buku <small style="color:green">(gambar) * opsional</small></label>
                    <div class="col-sm-10">
                        <input type="file" name="gambar_buku" class="form-control" placeholder="Sampul Buku">
                        <br/>
                        <img src="<?= base_url()?>assets/image/buku/<?= $data['gambar_buku'];?>" alt="" width="200">
                    </div>
                    </div>

                    <!-- <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Lampiran Buku <small style="color:green">(pdf) * opsional</small></label>
                    <div class="col-sm-10">
                        <input type="file" name="lampiran_buku" class="form-control" placeholder="Lampiran Buku">
                    </div>
                    </div> -->

                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Perubahan Terakhir</label>
                    <div class="col-sm-10">
                        <input type="text" name="tanggal_berubah" value="<?= $tanggal;?>" class="form-control" placeholder="Tanggal Perubahan Terakhir" readonly>
                    </div>
                    </div>
                </div>

            </div>
              <!-- /.box-body -->
                <div class="box-footer">
                <!-- kembali di kontroler anggota -->
                    <a href="<?= base_url()?>Buku" class="btn btn-warning">Cancel</a> 
                    <button type="submit" class="btn btn-primary pull-right">Update</button>
                </div>
              <!-- /.box-footer -->
        </form>
        
    </div>
    <!-- /.box -->
</div>