<div class="box">
    <div class="box-header">
        <h3 class="box-title">Detail Pinjam Buku</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id Buku</th>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['buku_dipinjam'] as $buku) { ?>
                    <tr>
                        <td><?= $buku->id_buku; ?></td>
                        <td><?= $buku->judul_buku; ?></td>
                        <td><?= $buku->pengarang; ?></td>
                        <td><?= $buku->penerbit; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
