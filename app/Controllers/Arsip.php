<?php

namespace App\Controllers;

use App\Models\KegiatanModel;

class Arsip extends BaseController
{
    public function index()
    {
        helper('text');

        $model = new KegiatanModel();
        $data['kegiatan'] = $model->orderBy('tanggal_mulai', 'DESC')->findAll();
        return view('public/arsip/index', $data);
    }
}
