<?= $this->extend('layout/pelanggan') ?>
<?= $this->section('content') ?>

<div class="container mt-4">

    <div class="card">

        <div class="card-header">
            <h3>Invoice Pemesanan</h3>
        </div>

        <div class="card-body">

            <table class="table">

                <tr>
                    <th>No Invoice</th>
                    <td><?= $pemesanan['no_invoice'] ?></td>
                </tr>

                <tr>
                    <th>Paket</th>
                    <td><?= $paket['nama_paket'] ?></td>
                </tr>

                <tr>
                    <th>Jumlah Porsi</th>
                    <td><?= $pemesanan['jumlah_porsi'] ?></td>
                </tr>

                <tr>
                    <th>Tanggal Acara</th>
                    <td><?= $pemesanan['tanggal_acara'] ?></td>
                </tr>

                <tr>
                    <th>Alamat Acara</th>
                    <td><?= $pemesanan['alamat_acara'] ?></td>
                </tr>

                <tr>
                    <th>Total Tagihan</th>
                    <td>
                        Rp <?= number_format($pemesanan['total_tagihan'],0,',','.') ?>
                    </td>
                </tr>

                <?php
                $dp = $pemesanan['total_tagihan'] * 0.5;
                $sisa = $pemesanan['total_tagihan'] - $dp;
                ?>

                <tr>
                    <th>DP 50%</th>
                    <td>
                        Rp <?= number_format($dp,0,',','.') ?>
                    </td>
                </tr>

                <tr>
                    <th>Sisa Pelunasan</th>
                    <td>
                        Rp <?= number_format($sisa,0,',','.') ?>
                    </td>
                </tr>

            </table>

            <div class="mt-3">

           <a href="<?= base_url('index.php/pelanggan/catering/bayar-dp/'.$pemesanan['id_pemesanan']) ?>"
            class="btn btn-success">
                Bayar DP
            </a>

        </div>

        </div>

    </div>

</div>

<?= $this->endSection() ?>