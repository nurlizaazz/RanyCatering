<?php

namespace App\Controllers\Pelanggan;

use App\Controllers\BaseController;
use App\Models\PelangganModel;

class ProfilController extends BaseController
{
    protected $PelangganModel;

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

        $this->PelangganModel = new PelangganModel();
    }

    public function index()
    {
        $idPelanggan =
            session()->get('id_pelanggan');

        $data['pelanggan'] =
            $this->PelangganModel->find(
                $idPelanggan
            );

        return view(
            'Pelanggan/Profil/index',
            $data
        );
    }

    public function update()
    {
        $idPelanggan =
            session()->get('id_pelanggan');

        $this->PelangganModel->update(
            $idPelanggan,
            [

                'nama' =>
                    $this->request->getPost('nama'),

                'no_hp' =>
                    $this->request->getPost('no_hp'),

                'alamat' =>
                    $this->request->getPost('alamat')

            ]
        );

        return redirect()
            ->back()
            ->with(
                'success',
                'Profil berhasil diperbarui'
            );
    }
}