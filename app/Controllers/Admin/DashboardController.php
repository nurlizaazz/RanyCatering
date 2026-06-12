<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PaketModel;
use App\Models\MenuModel;
use App\Models\PemesananModel;
use App\Models\PembayaranModel;

class DashboardController extends BaseController
{
    protected $PaketModel;
    protected $MenuModel;
    protected $PemesananModel;
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
        $this->PaketModel = new PaketModel();
        $this->MenuModel = new MenuModel();
        $this->PemesananModel = new PemesananModel();
        $this->PembayaranModel = new PembayaranModel();
    }

    public function index()
    {
        $data['totalPaket'] =
            $this->PaketModel->countAll();

        $data['totalMenu'] =
            $this->MenuModel->countAll();

        $data['totalPesanan'] =
            $this->PemesananModel->countAll();

        $data['totalPembayaran'] =
            $this->PembayaranModel->countAll();

        return view(
            'Admin/Dashboard/index',
            $data
        );
    }
}