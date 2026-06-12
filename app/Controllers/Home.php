<?php

namespace App\Controllers;

use App\Models\PaketModel;
use App\Models\MenuModel;

class Home extends BaseController
{
    public function index()
    {
        $paketModel = new PaketModel();
        $menuModel  = new MenuModel();

        $data['paket'] = $paketModel->findAll();

        $data['menu'] = $menuModel
            ->where('status', 'Aktif')
            ->findAll();

        return view('home', $data);
    }
}