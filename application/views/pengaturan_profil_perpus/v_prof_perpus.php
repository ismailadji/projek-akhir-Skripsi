<div class="box-body">
    <!-- /.box-body -->
    <div class="box-footer">
        <img src="assets/image/profil_perpus/logo_smp_ua.png" style="width: 125px; height: 125px; display: block; margin-left: auto; margin-right: auto; margin-top: -10px; margin-bottom: 15px;">
        <!-- Animasi -->
        <!--<lottie-player src="../../assets/json/3151-books.json" background="transparent" speed="1" style="width: 125px; height: 125px; display: block; margin-left: auto; margin-right: auto; margin-top: -50px; margin-bottom: 15px;" loop autoplay></lottie-player>-->
           
            <p style="font-weight: bold;">Nama Aplikasi : <?= $profil['nama_apk']; ?></p>
            <p style="font-weight: bold;">Alamat : <?= $profil['alamat_smp']; ?></p>
            <p style="font-weight: bold;">Email : <?= $profil['email_smp']; ?></p>
            <p style="font-weight: bold;">Nomor Telepon : <?= $profil['no_tlp_smp']; ?></p>

    </div>
    <!-- /.box-footer -->
        <div class="box-header with-border">
            <a href="<?= base_url()?>Pprof_perpus/edit" class="btn btn-success pull-right"></i> Edit</a>
        </div>
</div>
