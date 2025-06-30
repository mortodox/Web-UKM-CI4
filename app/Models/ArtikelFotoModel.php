<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelFotoModel extends Model
{
    protected $table = 'artikel_foto';
    protected $primaryKey = 'id';
    protected $allowedFields = ['artikel_id', 'file_path'];
    public $timestamps = false;
}
