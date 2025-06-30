<?php

namespace App\Controllers;

use App\Models\KegiatanModel;

class Galeri extends BaseController
{
    public function index()
    {
        $model = new KegiatanModel();
        $kegiatan = $model->findAll();

        $galeri = [];

        foreach ($kegiatan as $item) {
            $dir = FCPATH . 'uploads/galeri';
            if (is_dir($dir)) {
                $files = scandir($dir);
                foreach ($files as $file) {
                    if ($file === '.' || $file === '..') continue;
                    if (str_contains($file, $item['judul'])) {
                        $galeri[] = [
                            'img' => base_url('uploads/galeri/' . $file),
                            'judul' => $item['judul'],
                            'tahun' => date('Y', strtotime($item['tanggal_mulai'])),
                            'lokasi' => $item['lokasi_gunung']
                        ];
                    }
                }
            }
        }

        return view('galeri/index', ['galeri' => $galeri]);
    }
}
