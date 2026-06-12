<?= $this->extend('layout/pelanggan') ?>
<?= $this->section('content') ?>

<div class="card">

    <div class="card-header">

        <h5 class="mb-0">

            Riwayat Pesanan

        </h5>

    </div>

    <div class="card-body">

        <?php if(!empty($pesanan)): ?>

            <div class="table-responsive">

                <table class="table table-hover">

                    <thead>

                        <tr>

                            <th>Invoice</th>

                            <th>Tanggal Acara</th>

                            <th>Total</th>

                            <th>Status</th>

                            <th>Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                    <?php foreach($pesanan as $p): ?>

                        <tr>

                            <td>
                                <?= $p['no_invoice'] ?>
                            </td>

                            <td>
                                <?= date(
                                    'd-m-Y',
                                    strtotime($p['tanggal_acara'])
                                ) ?>
                            </td>

                            <td>

                                Rp <?= number_format(
                                    $p['total_tagihan'],
                                    0,
                                    ',',
                                    '.'
                                ) ?>

                            </td>

                            <td>

                                <span class="badge bg-label-success">

                                    Selesai

                                </span>

                            </td>

                            <td>

                                <a href="<?= base_url(
                                    'index.php/pelanggan/catering/detail-pesanan/'.$p['id_pemesanan']
                                ) ?>"
                                   class="btn btn-primary btn-sm">

                                    Detail

                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        <?php else: ?>

            <div class="alert alert-info">

                Belum ada riwayat pesanan.

            </div>

        <?php endif; ?>

    </div>

</div>

<?= $this->endSection() ?>