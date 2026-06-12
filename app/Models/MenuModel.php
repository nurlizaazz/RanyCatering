<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table = 'menu';
    protected $primaryKey = 'id_menu';
    protected $returnType = 'array';

    protected $allowedFields = [
        'id_paket',
        'nama_menu',
        'deskripsi',
        'harga_tambahan',
        'gambar',
        'status'
    ];
}