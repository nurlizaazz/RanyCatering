<?php

namespace App\Controllers\Owner;

use App\Controllers\BaseController;
use App\Models\PemesananModel;
use App\Models\PelangganModel;

class DashboardController extends BaseController
{
    protected $PemesananModel;
    protected $PelangganModel;

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
        $this->PelangganModel = new PelangganModel();

        
    }

    public function index()
    {
        $data['totalPesanan'] =
            $this->PemesananModel->countAll();

        $data['totalPelanggan'] =
            $this->PelangganModel->countAll();

        $data['totalPendapatan'] =
            $this->PemesananModel
            ->selectSum('total_terbayar')
            ->first()['total_terbayar'] ?? 0;

        return view(
            'Owner/Dashboard/index',
            $data
        );
    }
}