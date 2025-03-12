<form action="<?= base_url('Proses_edit_dosen') ?>" method="post">
    <input type="hidden" name="id_dosen" value="<?= $data_dosen->id_dosen ?>">
    <div class="mb-3">
        <label for="nidn" class="form-label">NIDN</label>
        <input type="text" class="form-control" id="nidn" name="nidn" value="<?= $data_dosen->nidn ?>" required>
    </div>
    
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama" name="nama" value="<?= $data_dosen->nama ?>" required>
    </div>
    
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= $data_dosen->email ?>" required>
    </div>
    
    <div class="mb-3">
        <label for="no_telp" class="form-label">No Telepon</label>
        <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $data_dosen->no_telp ?>" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
