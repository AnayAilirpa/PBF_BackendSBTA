<?php foreach($all_data_bimbingan as $bimbingan) : ?>
    <p>Judul TA: <?= $bimbingan->id_ta; ?></p>
    <p>Dosen: <?= $bimbingan->id_dosen; ?></p>
    <p>Tanggal: <?= $bimbingan->tanggal_bimbingan; ?></p>
    <p>Catatan: <?= $bimbingan->catatan_bimbingan; ?></p>
    <p>Status Bimbingan: <?= $bimbingan->status; ?></p>
    <a href="<?= base_url('Edit_data_bimbingan/'.$bimbingan->id_jadwal) ?>">Edit</a>
    <a href="<?= base_url('Hapus_data_bimbingan/'.$bimbingan->id_jadwal) ?>">Hapus</a>
    <hr>
<?php endforeach ?>


<a href="<?= base_url('Tambah_data_bimbingan') ?>">Tambah</a>
