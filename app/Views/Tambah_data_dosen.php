<form action="<?= base_url('Proses_tambah_dosen') ?>" method="post">
    <div class="mb-3">
        <label for="NIDN" class="form-label">NIDN</label>
        <input type="text" class="form-control" id="nidn" name="nidn" required>
        <input type="hidden" name="id_dosen">
    </div>
    
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama" name="nama" required>
    </div>
    
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    
    <div class="mb-3">
        <label for="no_telp" class="form-label">No Telepon</label>
        <input type="text" class="form-control" id="no_telp" name="no_telp" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
