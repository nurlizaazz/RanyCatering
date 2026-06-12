<?php

namespace App\Controllers\Pelanggan;

use App\Controllers\BaseController;
use App\Models\PemesananModel;

class DashboardController extends BaseController
{
    protected $PemesananModel;

    public function __construct()
    {
         if (!session()->get('logged_in'))
    {
        header('Location: ' . base_url('index.php/login'));
        exit;
    }

    if (session()->get('role') != 'pelanggan')
    {
        exit('Akses Ditolak');
    }
        $this->PemesananModel = new PemesananModel();
    }

    public function index()
    {
       $idPelanggan = session()->get('id_pelanggan');// nanti ganti session login

        $data['notifPelunasan'] =
            $this->PemesananModel
            ->where('id_pelanggan', $idPelanggan)
            ->where('status_pesanan', 'Selesai')
            ->where('status_pembayaran', 'DP')
            ->countAllResults();

        $data['totalPesanan'] =
            $this->PemesananModel
            ->where('id_pelanggan', $idPelanggan)
            ->countAllResults();

        $data['pesananDP'] =
            $this->PemesananModel
            ->where('id_pelanggan', $idPelanggan)
            ->where('status_pembayaran', 'DP')
            ->countAllResults();

        $data['pesananLunas'] =
            $this->PemesananModel
            ->where('id_pelanggan', $idPelanggan)
            ->where('status_pembayaran', 'Lunas')
            ->countAllResults();

        $data['keranjang'] =
            count(session()->get('keranjang') ?? []);

        return view(
            'Pelanggan/Dashboard/index',
            $data
        );
    }
}