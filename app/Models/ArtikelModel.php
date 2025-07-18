<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table = 'artikel';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'judul',
        'isi',
        'penulis',
        'tanggal_publikasi',
        'views'
    ];
}
