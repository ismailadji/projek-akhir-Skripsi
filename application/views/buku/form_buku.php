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
        <form method="post" action="<?= base_url()?>Buku/simpan" enctype="multipart/form-data" class="form-horizontal" >
            <div class="box-body">
                <div class="col-sm-6">
                    <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Id Buku</label>
                    <div class="col-sm-10">
                        <input type="text" name="id_buku" value="<?= $id_buku;?>" class="form-control" readonly>
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Judul Buku</label>
                    <div class="col-sm-10">
                        <input type="text" name="judul_buku" class="form-control" placeholder="Masukan Judul Buku" required>
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">ISBN/ISSN</label>
                    <div class="col-sm-10">
                        <input type="text" name="isbn" class="form-control" placeholder="Masukan ISBN/ISSN" required>
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Kategori Buku</label>
                    <div class="col-sm-10">
                        <select name="id_kategori" class="form-control select2" required>
                            <option value="">- Pilih Kategori Buku - </option>
                            <?php foreach($kategori as $row){?>
								<option value="<?= $row->nama_kategori;?>"><?= $row->nama_kategori;?></option>
							<?php }?>
                        </select>
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Rak Buku</label>
                    <div class="col-sm-10">
                        <select name="id_rak" class="form-control select2" required>
                            <option value="">- Pilih Rak Buku - </option>
                            <?php foreach($rak as $row){?>
								<option value="<?= $row->nama_rak;?>"><?= $row->nama_rak;?></option>
							<?php }?>
                        </select>
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Nama Pengarang</label>
                    <div class="col-sm-10">
                        <input type="text" name="pengarang" class="form-control" placeholder="Masukan Nama Pengarang" required>
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Nama Penerbit</label>
                    <div class="col-sm-10">
                        <input type="text" name="penerbit" class="form-control" placeholder="Masukan Nama Penerbit" required>
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Tahun Terbit</label>
                    <div class="col-sm-10">
                        <select name="tahun_terbit" class="form-control select2" required>
                            <option value="">- Pilih Tahun - </option>
                            <?php 
                                for($tahun = 2000; $tahun<= 2025; $tahun++){?>
                                    <option value="<?= $tahun?>"><?= $tahun;?></option>
                                <?php }
                            ?>
                        </select>
                    </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Jumlah Buku</label>
                    <div class="col-sm-10">
                        <input type="number" name="jumlah_buku" class="form-control" placeholder="Masukan Jumlah Buku" required>
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Sampul Buku <small style="color:green">(gambar) * opsional</small></label>
                    <div class="col-sm-10">
                        <input type="file" name="gambar_buku" class="form-control" placeholder="Sampul Buku">
                    </div>
                    </div>

                    <!-- <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Lampiran Buku <small style="color:green">(pdf) * opsional</small></label>
                    <div class="col-sm-10">
                        <input type="file" name="lampiran_buku" class="form-control" placeholder="Lampiran Buku">
                    </div>
                    </div> -->

                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Buku Masuk</label>
                    <div class="col-sm-10">
                        <input type="text" name="tanggal_masuk" value="<?= $tanggal;?>" class="form-control" placeholder="Tanggal Masuk Buku" readonly>
                    </div>
                    </div>
                </div>

            </div>
              <!-- /.box-body -->
                <div class="box-footer">
                <!-- kembali di kontroler anggota -->
                    <a href="<?= base_url()?>Buku" class="btn btn-warning">Cancel</a> 
                    <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                </div>
              <!-- /.box-footer -->
        </form>
        
    </div>
    <!-- /.box -->
</div>