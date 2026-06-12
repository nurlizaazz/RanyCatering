<?= $this->extend('layout/pelanggan') ?>
<?= $this->section('content') ?>

<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">
                Detail Pesanan
            </h4>

        </div>

        <div class="card-body">

            <p>
                <strong>Invoice:</strong>
                <?= $pemesanan['no_invoice'] ?>
            </p>

            <p>
                <strong>Status Pembayaran:</strong>

                <?php if($pemesanan['status_pembayaran']=='Belum Bayar'): ?>

                    <span class="badge bg-danger">
                        Belum Bayar
                    </span>

                <?php elseif($pemesanan['status_pembayaran']=='DP'): ?>

                    <span class="badge bg-warning">
                        DP
                    </span>

                <?php else: ?>

                    <span class="badge bg-success">
                        Lunas
                    </span>

                <?php endif; ?>

            </p>

            <p>
                <strong>Status Pesanan:</strong>

                <?= $pemesanan['status_pesanan'] ?>
            </p>

            <p>
                <strong>Total Tagihan:</strong>

                Rp <?= number_format(
                    $pemesanan['total_tagihan'],
                    0,
                    ',',
                    '.'
                ) ?>
            </p>

            <p>
                <strong>Total Terbayar:</strong>

                Rp <?= number_format(
                    $pemesanan['total_terbayar'],
                    0,
                    ',',
                    '.'
                ) ?>
            </p>

            <p>
                <strong>Sisa Pembayaran:</strong>

                Rp <?= number_format(
                    $pemesanan['sisa_pembayaran'],
                    0,
                    ',',
                    '.'
                ) ?>
            </p>

            <hr>

            <h5 class="mb-3">

                Menu Pesanan

            </h5>

            <div class="table-responsive">

                <table class="table table-bordered">

                    <thead class="table-light">

                        <tr>

                            <th>Paket</th>
                            <th>Menu</th>
                            <th>Porsi</th>

                        </tr>

                    </thead>

                    <tbody>

                    <?php foreach($detail as $d): ?>

                        <tr>

                            <td>

                                <?= $d['nama_paket'] ?>

                            </td>

                            <td>

                                <?= $d['nama_menu'] ?>

                            </td>

                            <td>

                                <?= $d['jumlah_porsi'] ?>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

            <hr>

            <!-- DP dan Pesanan Belum Selesai -->

            <?php if(
                $pemesanan['status_pembayaran']=='DP'
                &&
                $pemesanan['status_pesanan']!='Selesai'
            ): ?>

                <div class="alert alert-info">

                    <h6>

                        Pelunasan Belum Tersedia

                    </h6>

                    Menunggu pesanan selesai diproses admin.

                </div>

            <?php endif; ?>



            <!-- DP dan Pesanan Sudah Selesai -->

            <?php if(
                $pemesanan['status_pembayaran']=='DP'
                &&
                $pemesanan['status_pesanan']=='Selesai'
            ): ?>

                <div class="alert alert-success">

                    <h6>

                        Pesanan Telah Selesai

                    </h6>

                    Silakan melakukan pelunasan sebesar:

                    <strong>

                        Rp <?= number_format(
                            $pemesanan['sisa_pembayaran'],
                            0,
                            ',',
                            '.'
                        ) ?>

                    </strong>

                    <hr>

                    <a
                        href="<?= base_url(
                            'index.php/pelanggan/catering/pelunasan/' .
                            $pemesanan['id_pemesanan']
                        ) ?>"
                        class="btn btn-success">

                        Bayar Pelunasan

                    </a>

                </div>

            <?php endif; ?>



            <!-- Sudah Lunas -->

            <?php if(
                $pemesanan['status_pembayaran']=='Lunas'
            ): ?>

                <div class="alert alert-success">

                    <h6>

                        Pesanan Telah Lunas

                    </h6>

                    Terima kasih telah menggunakan
                    Rany Catering.

                </div>

            <?php endif; ?>

        </div>

    </div>

</div>

<?= $this->endSection() ?>