<?php

namespace App\Controllers;

use App\Models\KegiatanModel;
use App\Models\UserModel;
use App\Models\ArtikelModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $kegiatanModel = new KegiatanModel();
        $userModel = new UserModel();
        $artikelModel = new ArtikelModel();

        $data['jumlahKegiatan'] = $kegiatanModel->countAll();
        $data['jumlahUser'] = $userModel->countAll();
        $data['jumlahArtikel'] = $artikelModel->countAll();
        $data['totalViews'] = $artikelModel->selectSum('views')->first()['views'];

        $data['daftarArtikel'] = $artikelModel
            ->select('id, judul, penulis, tanggal_publikasi, views')
            ->orderBy('views', 'DESC')
            ->findAll(10);

        return view('dashboard/index', $data);
    }
}
