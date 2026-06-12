<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MenuModel;
use App\Models\PaketModel;

class MenuController extends BaseController
{
    protected $MenuModel;
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
        $this->MenuModel = new MenuModel();
        $this->PaketModel = new PaketModel();
    }

    public function index()
    {
        $data['menu'] = $this->MenuModel
            ->select('menu.*, paket.nama_paket')
            ->join('paket','paket.id_paket = menu.id_paket')
            ->findAll();

        $data['paket'] = $this->PaketModel->findAll();

        return view('Admin/Menu/index',$data);
    }

    public function simpan()
{
    $gambar = $this->request->getFile('gambar');

    $namaGambar = null;

    if($gambar && $gambar->isValid())
    {
        $namaGambar = $gambar->getRandomName();

        $gambar->move(
            FCPATH.'uploads/menu',
            $namaGambar
        );
    }

    $this->MenuModel->insert([

        'id_paket' =>
            $this->request->getPost('id_paket'),

        'nama_menu' =>
            $this->request->getPost('nama_menu'),

        'deskripsi' =>
            $this->request->getPost('deskripsi'),

        'harga_tambahan' =>
            $this->request->getPost('harga_tambahan'),

        'gambar' =>
            $namaGambar,

        'status' =>
            $this->request->getPost('status')

    ]);
    

    return redirect()
    ->to(
        base_url('index.php/admin/menu')
    )
    ->with(
        'success',
        'Menu berhasil ditambahkan'
    );
}

public function update($id)
{
    $menu = $this->MenuModel->find($id);

    $gambar = $this->request->getFile('gambar');

    $namaGambar = $menu['gambar'];

    if($gambar && $gambar->isValid())
    {
        $namaGambar = $gambar->getRandomName();

        $gambar->move(
            FCPATH.'uploads/menu',
            $namaGambar
        );
    }

    $this->MenuModel->update($id,[

        'id_paket' =>
            $this->request->getPost('id_paket'),

        'nama_menu' =>
            $this->request->getPost('nama_menu'),

        'deskripsi' =>
            $this->request->getPost('deskripsi'),

        'harga_tambahan' =>
            $this->request->getPost('harga_tambahan'),

        'gambar' =>
            $namaGambar,

        'status' =>
            $this->request->getPost('status')

    ]);

    return redirect()
        ->back()
        ->with(
            'success',
            'Menu berhasil diperbarui'
        );
}

public function hapus($id)
{
    $menu = $this->MenuModel->find($id);

    if($menu['gambar'])
    {
        $path =
            FCPATH.'uploads/menu/'.$menu['gambar'];

        if(file_exists($path))
        {
            unlink($path);
        }
    }

    $this->MenuModel->delete($id);

    return redirect()
        ->back()
        ->with(
            'success',
            'Menu berhasil dihapus'
        );
}
}