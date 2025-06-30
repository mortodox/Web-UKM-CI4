<?php

namespace App\Controllers;

use App\Models\KegiatanModel;

class Peta extends BaseController
{
    public function index()
    {
        $model = new KegiatanModel();
        $data['kegiatan'] = $model->where('gpx_file IS NOT NULL')->findAll();
        return view('public/peta/index', $data);
    }
}
