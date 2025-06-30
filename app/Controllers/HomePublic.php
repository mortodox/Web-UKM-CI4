<?php

namespace App\Controllers;

use App\Models\KegiatanModel;
use App\Models\ArtikelModel;
use App\Models\ArtikelFotoModel;

class HomePublic extends BaseController
{
    public function index()
    {
        $kegiatanModel = new KegiatanModel();
        $artikelModel = new ArtikelModel();
        $fotoModel = new ArtikelFotoModel();

        $data['kegiatan'] = $kegiatanModel->orderBy('tanggal_mulai', 'DESC')->findAll(3); // Top 3 kegiatan
        $data['artikel'] = $artikelModel->orderBy('tanggal_publikasi', 'DESC')->findAll(3); // Top 3 artikel
        $data['galeri'] = $fotoModel->orderBy('id', 'DESC')->findAll(8); // 8 foto galeri

        return view('public/home', $data);
    }
}
