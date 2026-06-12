<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PaketModel;

class PaketController extends BaseController
{
    protected $PaketModel;

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
    }

    public function index()
    {
        $data['paket'] =
            $this->PaketModel->findAll();

        return view(
            'Admin/Paket/index',
            $data
        );
    }

    public function tambah()
    {
        return view('Admin/Paket/tambah');
    }

    public function simpan()
    {
        $gambar = $this->request->getFile('gambar');

        $namaGambar = null;

        if ($gambar && $gambar->isValid())
        {
            $namaGambar = $gambar->getRandomName();

            $gambar->move(
                FCPATH . 'uploads/paket',
                $namaGambar
            );
        }

        $this->PaketModel->insert([

            'nama_paket' =>
                $this->request->getPost('nama_paket'),

            'harga_porsi' =>
                $this->request->getPost('harga_porsi'),

            'deskripsi' =>
                $this->request->getPost('deskripsi'),

            'gambar' =>
                $namaGambar

        ]);

       return redirect()
        ->to(base_url('index.php/admin/paket'))
        ->with('success', 'Paket berhasil ditambahkan');
        }


    public function update($id)
{
    $paket = $this->PaketModel->find($id);

    $gambar = $this->request->getFile('gambar');

    $namaGambar = $paket['gambar'];

    if($gambar && $gambar->isValid())
    {
        $namaGambar = $gambar->getRandomName();

        $gambar->move(
            FCPATH.'uploads/paket',
            $namaGambar
        );
    }

    $this->PaketModel->update($id,[

        'nama_paket' =>
            $this->request->getPost('nama_paket'),

        'harga_porsi' =>
            $this->request->getPost('harga_porsi'),

        'deskripsi' =>
            $this->request->getPost('deskripsi'),

        'gambar' =>
            $namaGambar

    ]);

    return redirect()
    ->to(base_url('index.php/admin/paket'))
    ->with('success', 'Paket berhasil diperbarui');
}

public function hapus($id)
{
    $paket = $this->PaketModel->find($id);

    if($paket['gambar'])
    {
        $path = FCPATH.'uploads/paket/'.$paket['gambar'];

        if(file_exists($path))
        {
            unlink($path);
        }
    }

    $this->PaketModel->delete($id);

    return redirect()
        ->to(base_url('index.php/admin/paket'))
        ->with(
            'success',
            'Paket berhasil dihapus'
        );
}
}