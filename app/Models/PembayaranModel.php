<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
    protected $table = 'pembayaran';

    protected $primaryKey = 'id_pembayaran';

    protected $returnType = 'array';

    protected $allowedFields = [
        'id_pemesanan',
        'jenis_pembayaran',
        'metode_pembayaran',
        'nominal',
        'tanggal_bayar'
    ];
}