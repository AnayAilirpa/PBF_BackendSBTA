<form action="<?= base_url('Proses_edit_bimbingan') ?>" method="post">
    <input type="hidden" name="id_jadwal" value="<?= $data_bimbingan->id_jadwal ?>">
    <div class="mb-3">
        <label for="id" class="form-label">NPM</label>
        <input type="text" class="form-control" id="npm" name="npm" value="<?= $data_bimbingan->npm ?>" required>
    </div>
    
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama" name="nama" value="<?= $data_bimbingan->nama ?>" required>
    </div>
    
    <div class="mb-3">
        <label for="angkatan" class="form-label">Angkatan</label>
        <input type="number" class="form-control" id="angkatan" name="angkatan" value="<?= $data_bimbingan->angkatan ?>" required>
    </div>
    
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= $data_bimbingan->email ?>" required>
    </div>
    
    <div class="mb-3">
        <label for="no_telp" class="form-label">No Telepon</label>
        <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $data_bimbingan->no_telp ?>" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
