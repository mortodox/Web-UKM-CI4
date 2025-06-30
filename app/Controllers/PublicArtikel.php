<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\ArtikelFotoModel;

class PublicArtikel extends BaseController
{
    public function index()
    {
        $model = new ArtikelModel();
        $data['artikel'] = $model->orderBy('tanggal_publikasi', 'DESC')->findAll();
        return view('public/artikel/index', $data);
    }

    public function detail($id)
    {
        $model = new ArtikelModel();
        $fotoModel = new ArtikelFotoModel();

        $model->where('id', $id)->set('views', 'views + 1', false)->update();
        $data['artikel'] = $model->find($id);
        $data['fotos'] = $fotoModel->where('artikel_id', $id)->findAll();

        return view('public/artikel/detail', $data);
    }
}
