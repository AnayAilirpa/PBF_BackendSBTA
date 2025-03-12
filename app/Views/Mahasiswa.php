<?php foreach($all_data_mahasiswa as $mahasiswa) : ?>
    <p>NPM: <?= $mahasiswa->npm; ?></p>
    <p>Nama: <?= $mahasiswa->nama; ?></p>
    <p>Angkatan: <?= $mahasiswa->angkatan; ?></p>
    <p>Email: <?= $mahasiswa->email; ?></p>
    <p>No Telp: <?= $mahasiswa->no_telp; ?></p>
    <a href="<?= base_url('Edit_data_mahasiswa/'.$mahasiswa->npm) ?>">Edit</a>
    <a href="<?= base_url('Hapus_data_mahasiswa/'.$mahasiswa->npm) ?>">Hapus</a>
    <hr>
<?php endforeach ?>


<a href="<?= base_url('Tambah_data_mahasiswa') ?>">Tambah</a>
