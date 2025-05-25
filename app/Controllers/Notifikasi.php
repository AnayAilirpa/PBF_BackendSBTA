<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\NotifikasiModel;

class Notifikasi extends BaseController
{
    use ResponseTrait;

    protected $notifikasiModel;

    public function __construct()
    {
        $this->notifikasiModel = new NotifikasiModel();
    }

    // GET: Notifikasi untuk mahasiswa
    public function notifikasi_mahasiswa($npm)
    {
        $data = $this->notifikasiModel
            ->where('penerima_npm', $npm)
            ->orderBy('waktu_dibuat', 'DESC')
            ->findAll();

        return $this->respond($data);
    }

    // GET: Notifikasi untuk dosen
    public function notifikasi_dosen($nidn)
    {
        $data = $this->notifikasiModel
            ->where('penerima_nidn', $nidn)
            ->orderBy('waktu_dibuat', 'DESC')
            ->findAll();

        return $this->respond($data);
    }

    // POST: Tambah notifikasi
    public function tambah_data_notifikasi()
    {
        $input = $this->request->getJSON(true); // auto-handle JSON dan form input
        $data = [
            'penerima_npm'     => $input['penerima_npm'] ?? null,
            'penerima_nidn'    => $input['penerima_nidn'] ?? null,
            'judul'            => $input['judul'],
            'pesan'            => $input['pesan'],
        ];

        if (!$data['penerima_npm'] && !$data['penerima_nidn']) {
            return $this->failValidationErrors("Harus ada penerima_npm atau penerima_nidn");
        }

        $this->notifikasiModel->insert($data);
        $data['id'] = $this->notifikasiModel->getInsertID();

        return $this->respondCreated($data);
    }

    // PUT: Tandai notifikasi sudah dibaca
    public function tandai_sudah_dibaca($id)
    {
        $notifikasi = $this->notifikasiModel->find($id);

        if (!$notifikasi) {
            return $this->failNotFound("Notifikasi tidak ditemukan");
        }

        $this->notifikasiModel->update($id, ['status_dibaca' => 1]);

        return $this->respond(['message' => 'Notifikasi ditandai sebagai sudah dibaca']);
    }
}
