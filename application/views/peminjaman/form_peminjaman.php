<?php
    $tanggal_pinjam = date('y-m-d');

    $empatbelas_hari = mktime(0,0,0,date("n"),date("j") + 14, date("y"));
    $tanggal_kembali = date('y-m-d', $empatbelas_hari); //berfungsi untuk menghitung selisih tgl pinjam dan tgl kembali
   
    $hasilScanQRCode = '<?php echo isset($result) ? $result : ""; ?>';
    $id_bukuQRCode = '';
    $judul_bukuQRCode = '';
    $pengarangQRCode = '';
    $penerbitQRCode = '';

    if (!empty($hasilScanQRCode)) {
        $dataQRCode = explode('|', $hasilScanQRCode);
        if (isset($dataQRCode[0])) {
            $id_bukuQRCode = $dataQRCode[0];
        } else {
            $id_bukuQRCode = '';
        }
        if (isset($dataQRCode[2])) {
            $judul_bukuQRCode = $dataQRCode[2];
        } else {
            $judul_bukuQRCode = '';
        }
        if (isset($dataQRCode[3])) {
            $pengarangQRCode = $dataQRCode[3];
        } else {
            $pengarangQRCode = '';
        }
        if (isset($dataQRCode[4])) {
            $penerbitQRCode = $dataQRCode[4];
        } else {
            $penerbitQRCode = '';
        }
    }
?>


<!-- Script untuk menangani kamera -->
<script src="<?= base_url()?>assets/https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<script src="<?= base_url()?>assets/https://unpkg.com/vue-web-cam"></script>

<div class="body">
    <div class="col-md-12">
        <div class="box box-info">
                                                <!-- contr buku->simpan -->
            <form method="post" action="<?= base_url()?>Peminjaman/simpan" enctype="multipart/form-data" class="form-horizontal" id="myForm">
                <div id="app" class="box-body">

                    <div class="col-sm-6">

                        <table class="table table-striped">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Id Peminjaman</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="id_peminjaman" value="<?= $id_peminjaman;?>" class="form-control" readonly>
                                    </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Nama Peminjam</label>
                                <div class="col-sm-10">
                                    <select name="id_anggota" class="form-control select2" required>
                                        <option value="">- Masukkan Nama Peminjam - </option>
                                        <?php foreach($peminjam as $row){?>
                                            <option value="<?= $row->nama;?>"><?= $row->nama;?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        </table>

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
                                <legend class="scheduler-border"> Form Scan QRCode</legend>
                                <input type="hidden" name="qrcode" id="code" autofocus readonly>
                            </fieldset>

                            <?php
                                $qrcode_data = $this->input->post('qrcode');
                                if (!empty($qrcode_data)) {
                                    $qrcode_array = explode('|', $qrcode_data);
                                    if (count($qrcode_array) >= 7) {
                                        $id_buku = $qrcode_array[0];
                                        $isbn = $qrcode_array[1];
                                        $judul_buku = $qrcode_array[2];
                                        $pengarang = $qrcode_array[3];
                                        $penerbit = $qrcode_array[4];
                                        $tahun_terbit = $qrcode_array[5];

                                        $sql = "SELECT * FROM buku WHERE id_buku = '$id_buku' AND isbn = '$isbn' AND judul_buku = '$judul_buku' AND pengarang = '$pengarang' AND penerbit = '$penerbit' AND tahun_terbit = '$tahun_terbit'";
                                        $resultSQL = $this->db->query($sql)->row_array();

                                        if ($resultSQL) {
                                            $_SESSION['id_buku'] = $resultSQL['id_buku'];
                                            $_SESSION['judul_buku'] = $resultSQL['judul_buku'];
                                            $_SESSION['pengarang'] = $resultSQL['pengarang'];
                                            $_SESSION['penerbit'] = $resultSQL['penerbit'];
                                        }
                                    }
                                }
                            ?>
                        </div>
                        <div class="col-xs-12 preview-container camera">
                            <video id="preview" class="thumbnail"></video>
                        </div>

                        <!-- <div class="form-group">
                            <label for="judul_buku" class="col-sm-2 control-label">Judul Buku</label>
                            <div class="col-sm-10">
                                <input type="text" name="judul_buku[]" class="form-control" placeholder="Masukkan judul buku" required value="<?= isset($judul_buku) ? $judul_buku : ''; ?>">
                            </div>
                        </div> -->

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Buku</label>
                            <div class="col-sm-8">
                                <select name="id_buku" id="id_buku" class="form-control select2" required>
                                    <option value="">- Pilih Buku - </option>
                                    <?php foreach($buku as $row){?>
                                        <option value="<?= $row->id_buku; ?>" data-judul="<?= $row->judul_buku; ?>" data-pengarang="<?= $row->pengarang; ?>" data-penerbit="<?= $row->penerbit; ?>"><?= $row->judul_buku; ?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-primary" onclick="tambahBuku()">Tambah</button>
                            </div>
                        </div>

                        <table class="table table-bordered" id="tabelData">
                            <thead>
                                <tr>
                                    <th>ID Buku</th>
                                    <th>Judul Buku</th>
                                    <th>Pengarang</th>
                                    <th>Penerbit</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Tambahkan baris hasil scan di sini -->
                            </tbody>
                        </table>

                    </div>

                    <div class="col-sm-6">

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Peminjaman</label>
                                <div class="col-sm-10">
                                    <input type="text" name="tanggal_pinjam" value="<?= $tanggal_pinjam;?>" class="form-control" readonly>
                                </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Pengembalian</label>
                                <div class="col-sm-10">
                                    <input type="text" name="tanggal_kembali" value="<?= $tanggal_kembali;?>" class="form-control" readonly>
                                </div>
                        </div>
                    </div>
                </div>
                    
                    <div class="box-footer">
                    <!-- kembali di kontroler anggota -->
                        <a href="<?= base_url()?>Peminjaman" class="btn btn-warning">Cancel</a> 
                        <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                    </div>
            </form>  
        </div>
    </div>
    
    <script>
        $('#id_buku').change(function() {
            var id = $(this).val();
            $.ajax({
                url: '<?= base_url() ?>peminjaman/jumlah_buku',
                data: { id: id },
                method: 'post',
                dataType: 'json',
                success: function(hasil) {
                    var jumlah_buku = parseInt(hasil.jumlah_buku);
                    
                    if (jumlah_buku <= 0) {
                        alert('Maaf, Stok buku ini sedang kosong');
                        $(this).val(""); // Mengosongkan input pilih buku
                    }
                }
            });
        });
    </script>
    <script> 
        // Mendapatkan hasil scan QR code
        var hasilScanQRCode = '<?php echo isset($result) ? $result : ""; ?>';

        // Jika hasil scan QR code tidak kosong
        if (hasilScanQRCode !== '') {
            // Mendapatkan data buku dari hasil scan QR code
            var data = hasilScanQRCode.split('|');
            var id_buku = data[0];
            var judul_buku = data[2];
            var pengarang = data[3];
            var penerbit = data[4];

            // Membuat baris baru pada tabel
            var newRow = "<tr>" +
                "<td>" + id_buku + "</td>" +
                "<td>" + judul_buku + "</td>" +
                "<td>" + pengarang + "</td>" +
                "<td>" + penerbit + "</td>" +
                "<td><button type='button' class='btn btn-danger btn-sm' onclick='hapusBuku(this)'>Hapus</button></td>" +
                "</tr>";

            // Memasukkan baris ke dalam tabel
            $("#tabelData").append(newRow);
            
            // Mereset input pilih buku
            document.getElementsByName("id_buku")[0].value = id_buku;
        }

    </script>

<script>
    function tambahBuku() {
        var maxRows = 3; // Jumlah maksimal peminjaman

        // Menghitung jumlah baris (buku) yang telah ditambahkan ke dalam tabel
        var numRows = $("#tabelData tr").length;

        if (numRows >= maxRows) {
            alert("Maksimal peminjaman hanya boleh 2 buku.");
        } else {
            var id_buku = document.getElementsByName("id_buku")[0].value;
            var judul_buku = document.querySelector("select[name='id_buku'] option:checked").getAttribute("data-judul");
            var pengarang = document.querySelector("select[name='id_buku'] option:checked").getAttribute("data-pengarang");
            var penerbit = document.querySelector("select[name='id_buku'] option:checked").getAttribute("data-penerbit");

            // Membuat baris baru pada tabel
            var newRow = "<tr>" +
                "<td>" + id_buku + "</td>" +
                "<td>" + judul_buku + "</td>" +
                "<td>" + pengarang + "</td>" +
                "<td>" + penerbit + "</td>" +
                "<td><button type='button' class='btn btn-danger btn-sm' onclick='hapusBuku(this)'>Hapus</button></td>" +
                "</tr>";

            // Memasukkan baris ke dalam tabel
            $("#tabelData").append(newRow);

            // Mereset input pilih buku
            document.getElementsByName("id_buku")[0].value = "";
        }
    }

    function hapusBuku(button) {
        $(button).closest("tr").remove();
    }

</script>
</div>
