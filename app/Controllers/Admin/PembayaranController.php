<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PembayaranModel;

class PembayaranController extends BaseController
{
    protected $PembayaranModel;

    public function __construct()
    {
         if (!session()->get('logged_in'))
    {
        header('Location: ' . base_url('index.php/login'));
        exit;
    }

    if (session()->get('role') != 'admin')
    {
        exit('Akses Ditolak');
    }
        $this->PembayaranModel =
            new PembayaranModel();
    }

    public function index()
    {
        $data['pembayaran'] =
        $this->PembayaranModel
        ->select(
            'pembayaran.*, 
            pemesanan.no_invoice,
            pelanggan.nama'
        )
        ->join(
            'pemesanan',
            'pemesanan.id_pemesanan = pembayaran.id_pemesanan'
        )
        ->join(
            'pelanggan',
            'pelanggan.id_pelanggan = pemesanan.id_pelanggan'
        )
        ->orderBy(
            'tanggal_bayar',
            'DESC'
        )
        ->findAll();

        return view(
            'Admin/Pembayaran/index',
            $data
        );
    }
}