<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PemesananModel;
use App\Models\PelangganModel;

class PemesananController extends BaseController
{
    protected $PemesananModel;

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
            ->findAll();

        return view(
            'Admin/Pemesanan/index',
            $data
        );
    }

   public function updateStatus($id)
{
    $pemesanan =
        $this->PemesananModel->find($id);

    if(
        $pemesanan['status_pembayaran']
        == 'Belum Bayar'
    )
    {
        return redirect()
            ->back()
            ->with(
                'error',
                'Pesanan belum membayar DP'
            );
    }

    $this->PemesananModel->update($id,[

        'status_pesanan' =>
            $this->request
                ->getPost('status_pesanan')

    ]);

    return redirect()
        ->back()
        ->with(
            'success',
            'Status berhasil diperbarui'
        );
}
}