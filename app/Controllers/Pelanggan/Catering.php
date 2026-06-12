<?php

namespace App\Controllers\Pelanggan;

use App\Controllers\BaseController;
use App\Models\PaketModel;
use App\Models\PemesananModel;
use App\Models\PembayaranModel;
use App\Models\MenuModel;
use App\Models\DetailPemesananModel;

class Catering extends BaseController
{
    protected $PaketModel;
    protected $PemesananModel;
    protected $PembayaranModel;
    protected $MenuModel;
    protected $DetailPemesananModel;

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

        $this->PaketModel = new PaketModel();
        $this->PemesananModel = new PemesananModel();
        $this->PembayaranModel = new PembayaranModel();
        $this->MenuModel = new MenuModel();
        $this->DetailPemesananModel = new DetailPemesananModel();
    }

    public function index()
    {
        $data['paket'] = $this->PaketModel->findAll();

        return view('Pelanggan/Catering/index', $data);
    }
    public function pesan($id)
{
    $paket = $this->PaketModel->find($id);

    $data['paket'] = $paket;

    return view('Pelanggan/Catering/pesan', $data);
}

public function simpan()
{
    $idPaket = $this->request->getPost('id_paket');
    $jumlahPorsi = $this->request->getPost('jumlah_porsi');
    $tanggalAcara = $this->request->getPost('tanggal_acara');
    $alamatAcara = $this->request->getPost('alamat_acara');

    $paket = $this->PaketModel->find($idPaket);

    $harga = $paket['harga_porsi'];

    $totalTagihan = $harga * $jumlahPorsi;

    $invoice = 'INV' . date('YmdHis');

    $this->PemesananModel->insert([
        'id_pelanggan' =>
        session()->get('id_pelanggan'),
        'id_paket'           => $idPaket,
        'no_invoice'         => $invoice,
        'jumlah_porsi'       => $jumlahPorsi,
        'tanggal_acara'      => $tanggalAcara,
        'alamat_acara'       => $alamatAcara,
        'total_tagihan'      => $totalTagihan,
        'total_terbayar'     => 0,
        'sisa_pembayaran'    => $totalTagihan,
        'status_pembayaran'  => 'Belum Bayar'
    ]);

    $idPemesanan = $this->PemesananModel->getInsertID();

$pemesanan = $this->PemesananModel->find($idPemesanan);

$data = [
    'pemesanan' => $pemesanan,
    'paket' => $paket
];

return view('Pelanggan/Catering/invoice', $data);
}

public function bayarDP($id)
{
    $pemesanan = $this->PemesananModel->find($id);

    $data['pemesanan'] = $pemesanan;

    return view('Pelanggan/Catering/bayar_dp', $data);
}

public function prosesDP()
{
    $idPemesanan = $this->request->getPost('id_pemesanan');

    $nominal = $this->request->getPost('nominal');

    $metode = $this->request->getPost('metode_pembayaran');

    $this->PembayaranModel->insert([
        'id_pemesanan'       => $idPemesanan,
        'jenis_pembayaran'   => 'DP',
        'metode_pembayaran'  => $metode,
        'nominal'            => $nominal
    ]);

    $pemesanan = $this->PemesananModel->find($idPemesanan);

    $this->PemesananModel
    ->update($idPemesanan, [

        'total_terbayar' =>
            $nominal,

        'sisa_pembayaran' =>
            $pemesanan['total_tagihan'] - $nominal,

        'status_pembayaran' =>
            'DP',

        'status_pesanan' =>
            'Diproses'

    ]);

    return redirect()
    ->to(
        base_url(
            'index.php/pelanggan/catering/pesanan-saya'
        )
    )
    ->with(
        'success',
        'Pembayaran DP berhasil dilakukan'
    );
}
public function pelunasan($id)
{
    $pemesanan =
        $this->PemesananModel->find($id);

    $data['pemesanan'] =
        $pemesanan;

    return view(
        'Pelanggan/Catering/pelunasan',
        $data
    );
}

public function prosesPelunasan()
{
    $idPemesanan =
        $this->request->getPost('id_pemesanan');

    $nominal =
        $this->request->getPost('nominal');

    $metode =
        $this->request->getPost('metode_pembayaran');

    $pemesanan =
        $this->PemesananModel->find($idPemesanan);

    $this->PembayaranModel->insert([

        'id_pemesanan' =>
            $idPemesanan,

        'jenis_pembayaran' =>
            'Pelunasan',

        'metode_pembayaran' =>
            $metode,

        'nominal' =>
            $nominal

    ]);

    $this->PemesananModel->update($idPemesanan,[

        'total_terbayar' =>
            $pemesanan['total_tagihan'],

        'sisa_pembayaran' =>
            0,

        'status_pembayaran' =>
            'Lunas'

    ]);

    return redirect()
        ->to(
            base_url(
                'index.php/pelanggan/catering/pesanan-saya'
            )
        )
        ->with(
            'success',
            'Pelunasan berhasil dilakukan'
        );
}

public function menu($idPaket)
{
    $paket = $this->PaketModel->find($idPaket);

    $menu = $this->MenuModel
        ->where('id_paket', $idPaket)
        ->findAll();

    $data = [
        'paket' => $paket,
        'menu' => $menu
    ];

    return view('Pelanggan/Catering/menu', $data);
}

public function tambahKeranjang()
{
    $keranjang = session()->get('keranjang') ?? [];

    $keranjang[] = [
    'id_paket'      => $this->request->getPost('id_paket'),
    'menu'          => $this->request->getPost('menu'),
    'jumlah_porsi'  => $this->request->getPost('jumlah_porsi')
];

    session()->set('keranjang', $keranjang);

    return redirect()->to(
        base_url('index.php/pelanggan/catering/keranjang')
    );
}

public function keranjang()
{
    $keranjang = session()->get('keranjang') ?? [];

    foreach ($keranjang as $key => $item) {

        $paket = $this->PaketModel
            ->find($item['id_paket']);

        $keranjang[$key]['nama_paket'] =
            $paket['nama_paket'];

        $menuDipilih = [];

        if (!empty($item['menu'])) {

            foreach ($item['menu'] as $idMenu) {

                $menu = $this->MenuModel
                    ->find($idMenu);

                if ($menu) {
                    $menuDipilih[] =
                        $menu['nama_menu'];
                }
            }
        }

        $keranjang[$key]['nama_menu'] =
            $menuDipilih;
    }

    $data['keranjang'] = $keranjang;

    return view(
        'Pelanggan/Catering/keranjang',
        $data
    );
}

public function resetKeranjang()
{
    session()->remove('keranjang');

    return redirect()->to(
        base_url('index.php/pelanggan/catering')
    );
}

public function hapusKeranjang($index)
{
    $keranjang = session()->get('keranjang') ?? [];

    if (isset($keranjang[$index])) {
        unset($keranjang[$index]);

        $keranjang = array_values($keranjang);
    }

    session()->set('keranjang', $keranjang);

    return redirect()->to(
        base_url('index.php/pelanggan/catering/keranjang')
    );
}

public function checkout()
{
    $data['keranjang'] = session()->get('keranjang') ?? [];

    return view('Pelanggan/Catering/checkout', $data);
}

public function prosesCheckout()
{
    $keranjang = session()->get('keranjang') ?? [];

    $tanggalAcara = $this->request->getPost('tanggal_acara');
    $alamatAcara  = $this->request->getPost('alamat_acara');

    $totalTagihan = 0;

    foreach ($keranjang as $item)
    {
        $paket = $this->PaketModel
            ->find($item['id_paket']);

        $totalTagihan +=
            ($paket['harga_porsi'] *
             $item['jumlah_porsi']);
    }

    $invoice = 'INV' . date('YmdHis');

    $this->PemesananModel->insert([
        'id_pelanggan' => session()->get('id_pelanggan'),
        'no_invoice' => $invoice,
        'tanggal_acara' => $tanggalAcara,
        'alamat_acara' => $alamatAcara,
        'total_tagihan' => $totalTagihan,
        'total_terbayar' => 0,
        'sisa_pembayaran' => $totalTagihan,
        'status_pembayaran' => 'Belum Bayar',
        'status_pesanan' => 'Menunggu DP'
    ]);

    $idPemesanan =
        $this->PemesananModel->getInsertID();

    foreach ($keranjang as $item)
    {
        foreach ($item['menu'] as $idMenu)
        {
            $this->DetailPemesananModel->insert([
                'id_pemesanan' => $idPemesanan,
                'id_paket' => $item['id_paket'],
                'jumlah_porsi' => $item['jumlah_porsi'],
                'id_menu' => $idMenu
            ]);
        }
    }

    session()->remove('keranjang');

    return redirect()->to(
        base_url(
            'index.php/pelanggan/catering/bayar-dp/' .
            $idPemesanan
        )
    );
}

public function pesananSaya()
{
    $pesanan = $this->PemesananModel
        ->where('id_pelanggan', session()->get('id_pelanggan'))
        ->orderBy('id_pemesanan', 'DESC')
        ->findAll();

    $data['pesanan'] = $pesanan;

    return view(
        'Pelanggan/Catering/pesanan_saya',
        $data
    );
}

public function detailPesanan($id)
{
    $pemesanan = $this->PemesananModel
        ->find($id);

    $detail = $this->DetailPemesananModel
        ->where('id_pemesanan', $id)
        ->findAll();

    foreach($detail as $key => $d)
    {
        $paket = $this->PaketModel
            ->find($d['id_paket']);

        $menu = $this->MenuModel
            ->find($d['id_menu']);

        $detail[$key]['nama_paket']
            = $paket['nama_paket'];

        $detail[$key]['nama_menu']
            = $menu['nama_menu'];
    }

    $data = [
        'pemesanan' => $pemesanan,
        'detail' => $detail
    ];

    return view(
        'Pelanggan/Catering/detail_pesanan',
        $data
    );
}

public function riwayat()
{
    $data['pesanan'] = $this->PemesananModel
        ->where('id_pelanggan', session()->get('id_pelanggan'))
        ->where('status_pesanan', 'Selesai')
        ->where('status_pembayaran', 'Lunas')
        ->findAll();

    return view(
        'Pelanggan/Catering/riwayat',
        $data
    );
}
}