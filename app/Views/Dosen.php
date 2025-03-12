<?php foreach($all_data_dosen as $dosen) : ?>
    <p>NIM: <?= $dosen->nidn; ?></p>
    <p>Nama: <?= $dosen->nama; ?></p>
    <p>Email: <?= $dosen->email; ?></p>
    <p>No Telp: <?= $dosen->no_telp; ?></p>
    <a href="<?= base_url('Edit_data_dosen/'.$dosen->id_dosen) ?>">Edit</a>
    <a href="<?= base_url('Hapus_data_dosen/'.$dosen->id_dosen) ?>">Hapus</a>
    <hr>
<?php endforeach ?>


<a href="<?= base_url('Tambah_data_dosen') ?>">Tambah</a>
