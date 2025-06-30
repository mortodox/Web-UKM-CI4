<?php

namespace App\Models;

use CodeIgniter\Model;

class KegiatanModel extends Model
{
    protected $table = 'kegiatan';
    protected $primaryKey = 'id';
    protected $allowedFields = [
    'judul', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai',
    'lokasi_gunung', 'provinsi', 'koordinat_puncak',
    'tim_ekspeditor', 'gpx_file', 'laporan_kegiatan', 'dibuat_oleh','foto_dokumentasi'
];

}
