<?= $this->extend('layout/pelanggan') ?>
<?= $this->section('content') ?>

<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h5 class="mb-0">
            Pesanan Saya
        </h5>

    </div>

    <div class="card-body">

        <?php if(!empty($pesanan)): ?>

            <div class="table-responsive">

                <table class="table table-hover">

                    <thead>

                        <tr>
                            <th>No Invoice</th>
                            <th>Tanggal Acara</th>
                            <th>Total Tagihan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                    <?php foreach($pesanan as $p): ?>

                        <tr>

                            <td>
                                <strong>
                                    <?= $p['no_invoice'] ?>
                                </strong>
                            </td>

                            <td>
                                <?= date('d-m-Y', strtotime($p['tanggal_acara'])) ?>
                            </td>

                            <td>
                                Rp <?= number_format($p['total_tagihan'],0,',','.') ?>
                            </td>

                            <td>

                                <?php if($p['status_pembayaran'] == 'Belum Bayar'): ?>

                                    <span class="badge bg-label-danger">
                                        Belum Bayar
                                    </span>

                                <?php elseif($p['status_pembayaran'] == 'DP'): ?>

                                    <span class="badge bg-label-warning">
                                        DP
                                    </span>

                                <?php elseif($p['status_pembayaran'] == 'Lunas'): ?>

                                    <span
                                        class="badge"
                                        style="
                                            background:#ff9800;
                                            color:white;
                                            font-size:12px;
                                        ">

                                        ✓ Lunas

                                    </span>

                                <?php else: ?>

                                    <span class="badge bg-label-secondary">
                                        <?= $p['status_pembayaran'] ?>
                                    </span>

                                <?php endif; ?>

                            </td>

                            <td>

    <?php if(
        $p['status_pembayaran'] == 'Belum Bayar'
    ): ?>

        <a
            href="<?= base_url(
                'index.php/pelanggan/catering/bayar-dp/' .
                $p['id_pemesanan']
            ) ?>"
            class="btn btn-warning btn-sm">

            Bayar DP

        </a>

    <?php elseif(
        $p['status_pembayaran'] == 'DP'
        &&
        $p['status_pesanan'] == 'Selesai'
    ): ?>

        <a
            href="<?= base_url(
                'index.php/pelanggan/catering/pelunasan/' .
                $p['id_pemesanan']
            ) ?>"
            class="btn btn-success btn-sm">

            Bayar Pelunasan

        </a>

    <?php elseif(
        $p['status_pembayaran'] == 'Lunas'
    ): ?>

        <span
            class="badge"
            style="
                background:#ff9800;
                color:white;
                font-size:12px;
                padding:8px 12px;
            ">

            ✓ Lunas

        </span>

    <?php else: ?>

        <a
            href="<?= base_url(
                'index.php/pelanggan/catering/detail-pesanan/' .
                $p['id_pemesanan']
            ) ?>"
            class="btn btn-primary btn-sm">

            Detail

        </a>

    <?php endif; ?>

</td>
                        </tr>

                    <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        <?php else: ?>

            <div class="alert alert-warning">

                Belum ada pesanan.

            </div>

        <?php endif; ?>

    </div>

</div>

<?= $this->endSection() ?>