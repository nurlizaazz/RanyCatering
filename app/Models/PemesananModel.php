<?php

namespace App\Models;

use CodeIgniter\Model;

class PemesananModel extends Model
{
    protected $table = 'pemesanan';

    protected $primaryKey = 'id_pemesanan';

    protected $returnType = 'array';

    protected $allowedFields = [
    'id_pelanggan',
    'no_invoice',
    'tanggal_acara',
    'alamat_acara',
    'total_tagihan',
    'total_terbayar',
    'sisa_pembayaran',
    'status_pembayaran',
    'status_pesanan'
];
}