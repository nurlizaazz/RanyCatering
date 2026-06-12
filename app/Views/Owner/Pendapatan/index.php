<?= $this->extend('layout/owner') ?>
<?= $this->section('content') ?>

<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h5 class="mb-0">
            Laporan Pendapatan
        </h5>

        <a
            href="<?= base_url('index.php/owner/pendapatan/export-excel') ?>"
            class="btn text-white"
                        style="background:#ff9800;">

            Export Excel

        </a>

    </div>

    <div class="card-body">

        <div class="alert alert-success">

            <strong>Total Pendapatan :</strong>

            Rp <?= number_format(
                $totalPendapatan,
                0,
                ',',
                '.'
            ) ?>

        </div>

        <table
            class="table table-bordered table-hover">

            <thead>

                <tr>

                    <th>Invoice</th>
                    <th>Jenis Pembayaran</th>
                    <th>Metode Pembayaran</th>
                    <th>Nominal</th>
                    <th>Tanggal Bayar</th>

                </tr>

            </thead>

            <tbody>

            <?php if(!empty($pendapatan)): ?>

                <?php foreach($pendapatan as $p): ?>

                    <tr>

                        <td>
                            <?= $p['no_invoice'] ?>
                        </td>

                        <td>
                            <?= $p['jenis_pembayaran'] ?>
                        </td>

                        <td>
                            <?= $p['metode_pembayaran'] ?>
                        </td>

                        <td>

                            Rp <?= number_format(
                                $p['nominal'],
                                0,
                                ',',
                                '.'
                            ) ?>

                        </td>

                        <td>

                            <?= date(
                                'd-m-Y H:i',
                                strtotime(
                                    $p['tanggal_bayar']
                                )
                            ) ?>

                        </td>

                    </tr>

                <?php endforeach; ?>

            <?php else: ?>

                <tr>

                    <td
                        colspan="5"
                        class="text-center">

                        Belum ada data pendapatan

                    </td>

                </tr>

            <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

<?= $this->endSection() ?>