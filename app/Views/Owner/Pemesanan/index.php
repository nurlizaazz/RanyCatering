<?= $this->extend('layout/owner') ?>

<?= $this->section('content') ?>

<div class="card">


<div class="card-header d-flex justify-content-between align-items-center">

    <h5 class="mb-0">
        Laporan Pemesanan
    </h5>

    <a
        href="<?= base_url('index.php/owner/laporan/export-pemesanan') ?>"
        class="btn text-white"
                        style="background:#ff9800;">

        Export Excel

    </a>

</div>

<div class="card-body">

    <table class="table table-bordered table-hover">

        <thead>

            <tr>

                <th>Invoice</th>
                <th>Pelanggan</th>
                <th>Tanggal Acara</th>
                <th>Total</th>
                <th>Pembayaran</th>
                <th>Status</th>

            </tr>

        </thead>

        <tbody>

        <?php foreach($pemesanan as $p): ?>

            <tr>

                <td><?= $p['no_invoice'] ?></td>

                <td><?= $p['nama'] ?></td>

                <td><?= $p['tanggal_acara'] ?></td>

                <td>
                    Rp <?= number_format(
                        $p['total_tagihan'],
                        0,
                        ',',
                        '.'
                    ) ?>
                </td>

                <td><?= $p['status_pembayaran'] ?></td>

                <td><?= $p['status_pesanan'] ?></td>

            </tr>

        <?php endforeach; ?>

        </tbody>

    </table>

</div>


</div>

<?= $this->endSection() ?>
