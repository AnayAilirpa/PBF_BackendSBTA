<form action="<?= base_url('Proses_tambah_bimbingan') ?>" method="post">
    <input type="hidden" name="id_jadwal">

    <div class="mb-3">
        <label for="ta" class="form-label">Judul TA</label>
        <select name="ta" id="ta" class="form-select" required>
            <option value="" selected disabled hidden>Pilih Judul TA</option>
            <?php foreach ($all_data_ta as $index): ?>
                <option value="<?= $index['id_ta'] ?>"><?= $index['judul'] ?></option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="dosen" class="form-label">Dosen Pembimbing</label>
        <select name="dosen" id="dosen" class="form-select" required>
            <option value="" selected disabled hidden>Pilih Dosen Pembimbing</option>
            <?php foreach ($all_data_dosen as $index): ?>
                <option value="<?= $index['id_dosen'] ?>"><?= $index['nama'] ?></option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="catatan" class="form-label">Catatan</label>
        <textarea class="form-control" id="catatan" name="catatan" rows="3" required></textarea>
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status Bimbingan TA</label>
        <select class="form-select" id="status" name="status" required>
            <option value="" selected disabled hidden>Pilih Status Bimbingan</option>
            <option value="Menunggu Persetujuan">Menunggu Persetujuan</option>
            <option value="Dalam Bimbingan">Dalam Bimbingan</option>
            <option value="Revisi">Revisi</option>
            <option value="Selesai">Selesai</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal Bimbingan</label>
        <input type="datetime-local" class="form-control" name="tanggal" id="tanggal" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>