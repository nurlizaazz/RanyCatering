<?php

namespace App\Controllers\Owner;

use App\Controllers\BaseController;
use App\Models\PemesananModel;

class LaporanPemesananController extends BaseController
{
    protected $PemesananModel;

    public function __construct()
    {
         if (!session()->get('logged_in'))
    {
        header('Location: ' . base_url('index.php/login'));
        exit;
    }

    if (session()->get('role') != 'owner')
    {
        exit('Akses Ditolak');
    }
        $this->PemesananModel = new PemesananModel();
    }

    public function index()
    {
        $data['pemesanan'] =
            $this->PemesananModel
            ->select('pemesanan.*, pelanggan.nama')
            ->join(
                'pelanggan',
                'pelanggan.id_pelanggan = pemesanan.id_pelanggan'
            )
            ->orderBy(
                'id_pemesanan',
                'DESC'
            )
            ->findAll();

        return view(
            'Owner/Pemesanan/index',
            $data
        );
    }

    public function exportPemesanan()
{
$pemesanan = $this->PemesananModel
->select('
pemesanan.*,
pelanggan.nama
')
->join(
'pelanggan',
'pelanggan.id_pelanggan = pemesanan.id_pelanggan'
)
->orderBy(
'id_pemesanan',
'DESC'
)
->findAll();


header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Laporan_Pemesanan.xls");

echo "
<table border='1'>

    <tr>

        <th>Invoice</th>
        <th>Pelanggan</th>
        <th>Tanggal Acara</th>
        <th>Total Tagihan</th>
        <th>Status Pembayaran</th>
        <th>Status Pesanan</th>

    </tr>
";

foreach($pemesanan as $p)
{
    echo "

    <tr>

        <td>{$p['no_invoice']}</td>

        <td>{$p['nama']}</td>

        <td>{$p['tanggal_acara']}</td>

        <td>{$p['total_tagihan']}</td>

        <td>{$p['status_pembayaran']}</td>

        <td>{$p['status_pesanan']}</td>

    </tr>

    ";
}

echo "</table>";

exit;

}

}