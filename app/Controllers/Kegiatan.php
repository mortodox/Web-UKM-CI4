<?php

namespace App\Controllers;

use App\Models\KegiatanModel;

class Kegiatan extends BaseController
{
    protected $kegiatanModel;

    public function __construct()
    {
        $this->kegiatanModel = new KegiatanModel();
    }

    public function index()
{
    $model = new \App\Models\KegiatanModel();
    $data['kegiatan'] = $model->orderBy('tanggal_mulai', 'DESC')->findAll();


    return view('kegiatan/index', $data);
}


    public function create()
    {
        return view('kegiatan/create');
    }
public function kalender()
{
    $data['kegiatan'] = $this->kegiatanModel->findAll();
    return view('kegiatan/kalender', $data);
}


public function store()
{
    $model = new \App\Models\KegiatanModel();

    $fileGPX = $this->request->getFile('gpx_file');
    $fileLaporan = $this->request->getFile('laporan_kegiatan');

    $gpxName = $fileGPX && $fileGPX->isValid() ? $fileGPX->getRandomName() : null;
    $laporanName = $fileLaporan && $fileLaporan->isValid() ? $fileLaporan->getRandomName() : null;

    if ($gpxName) $fileGPX->move('uploads/gpx', $gpxName);
    if ($laporanName) $fileLaporan->move('uploads/laporan', $laporanName);

    $model->save([
        'judul' => $this->request->getPost('judul'),
        'deskripsi' => $this->request->getPost('deskripsi'),
        'tanggal_mulai' => $this->request->getPost('tanggal_mulai'),
        'tanggal_selesai' => $this->request->getPost('tanggal_selesai'),
        'lokasi_gunung' => $this->request->getPost('lokasi_gunung'),
        'provinsi' => $this->request->getPost('provinsi'),
        'koordinat_puncak' => $this->request->getPost('koordinat_puncak'),
        'tim_ekspeditor' => $this->request->getPost('tim_ekspeditor'),
        'gpx_file' => $gpxName,
        'laporan_kegiatan' => $laporanName,
        'dibuat_oleh' => $this->request->getPost('dibuat_oleh'),
    ]);

    return redirect()->to('/kegiatan')->with('message', 'Kegiatan berhasil disimpan.');
}


    public function edit($id)
    {
        $data['kegiatan'] = $this->kegiatanModel->find($id);
        return view('kegiatan/edit', $data);
    }

public function update($id)
{
    $validation = \Config\Services::validation();

    $rules = [
        'judul' => 'required|min_length[3]',
        'deskripsi' => 'required|min_length[5]',
        'tanggal' => 'required|valid_date',
        'lokasi' => 'required|min_length[3]',
    ];

    if (! $this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

    $this->kegiatanModel->update($id, [
        'judul' => $this->request->getPost('judul'),
        'deskripsi' => $this->request->getPost('deskripsi'),
        'tanggal' => $this->request->getPost('tanggal'),
        'lokasi' => $this->request->getPost('lokasi'),
    ]);

    return redirect()->to('/kegiatan');
}


    public function delete($id)
    {
        $this->kegiatanModel->delete($id);
        return redirect()->to('/kegiatan');
    }
}
