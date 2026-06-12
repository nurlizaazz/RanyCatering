<?php

namespace App\Controllers\Owner;

use App\Controllers\BaseController;
use App\Models\PembayaranModel;

class LaporanPendapatanController extends BaseController
{
    protected $PembayaranModel;

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
        $this->PembayaranModel =
            new PembayaranModel();
    }

    public function index()
    {
        $data['pendapatan'] =
            $this->PembayaranModel
            ->select(
                'pembayaran.*,
                pemesanan.no_invoice'
            )
            ->join(
                'pemesanan',
                'pemesanan.id_pemesanan = pembayaran.id_pemesanan'
            )
            ->orderBy(
                'tanggal_bayar',
                'DESC'
            )
            ->findAll();

        $total =
            $this->PembayaranModel
            ->selectSum('nominal')
            ->first();

        $data['totalPendapatan'] =
            $total['nominal'] ?? 0;

        return view(
            'Owner/Pendapatan/index',
            $data
        );
    }

    public function exportExcel()
{
    $pendapatan =
        $this->PembayaranModel
        ->select(
            'pembayaran.*,
            pemesanan.no_invoice'
        )
        ->join(
            'pemesanan',
            'pemesanan.id_pemesanan = pembayaran.id_pemesanan'
        )
        ->orderBy(
            'tanggal_bayar',
            'DESC'
        )
        ->findAll();

    $total =
        $this->PembayaranModel
        ->selectSum('nominal')
        ->first();

    $totalPendapatan =
        $total['nominal'] ?? 0;

    header("Content-Type: application/vnd.ms-excel");
    header(
        "Content-Disposition: attachment; filename=Laporan_Pendapatan.xls"
    );

    echo "

    <table border='1'>

        <tr>

            <th colspan='5'>

                LAPORAN PENDAPATAN RANY CATERING

            </th>

        </tr>

        <tr>

            <th colspan='5'>

                Total Pendapatan :
                Rp ".number_format(
                    $totalPendapatan,
                    0,
                    ',',
                    '.'
                )."

            </th>

        </tr>

        <tr>

            <th>Invoice</th>
            <th>Jenis Pembayaran</th>
            <th>Metode Pembayaran</th>
            <th>Nominal</th>
            <th>Tanggal Bayar</th>

        </tr>

    ";

    foreach($pendapatan as $p)
    {
        echo "

        <tr>

            <td>{$p['no_invoice']}</td>

            <td>{$p['jenis_pembayaran']}</td>

            <td>{$p['metode_pembayaran']}</td>

            <td>{$p['nominal']}</td>

            <td>{$p['tanggal_bayar']}</td>

        </tr>

        ";
    }

    echo "</table>";

    exit;
}
}