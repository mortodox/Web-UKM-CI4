<?php

namespace App\Controllers;

class Home extends BaseController
{
   public function index()
{
    $model = new \App\Models\ArtikelModel();
    $data['artikel'] = $model->orderBy('tanggal_publikasi', 'DESC')->limit(3)->findAll();
    return view('home', $data);
}
    public function galeri()
{
    $db = db_connect();
    $data['galeri'] = $db->table('artikel')
        ->select('artikel.*, artikel_foto.file_path')
        ->join('artikel_foto', 'artikel.id = artikel_foto.artikel_id', 'left')
        ->orderBy('tanggal_publikasi', 'DESC')
        ->get()->getResultArray();

    return view('galeri', $data);
}
}
