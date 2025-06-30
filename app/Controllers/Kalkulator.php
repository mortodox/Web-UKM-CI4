<?php

namespace App\Controllers;

class Kalkulator extends BaseController
{
    public function index()
    {
        return view('public/kalkulator/index');
    }

    public function hitung()
    {
        $usia = $this->request->getPost('usia');
        $jenis_kelamin = $this->request->getPost('jenis_kelamin');
        $berat = $this->request->getPost('berat');
        $tinggi = $this->request->getPost('tinggi');
        $aktivitas = $this->request->getPost('aktivitas');

        if ($jenis_kelamin === 'pria') {
            $bmr = 88.362 + (13.397 * $berat) + (4.799 * $tinggi) - (5.677 * $usia);
        } else {
            $bmr = 447.593 + (9.247 * $berat) + (3.098 * $tinggi) - (4.330 * $usia);
        }

        $faktorAktivitas = [
            'sangat_ringan' => 1.2,
            'ringan' => 1.375,
            'sedang' => 1.55,
            'berat' => 1.725,
            'sangat_berat' => 1.9,
        ];

        $kalori = round($bmr * $faktorAktivitas[$aktivitas]);

        return view('public/kalkulator/index', ['hasil' => $kalori]);
    }
}
