<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="card">

    <div class="card-header">

        <h5>Data Pembayaran</h5>

    </div>

    <div class="card-body">

        <table
            class="table table-bordered table-hover">

            <thead>

                <tr>

                    <th>Invoice</th>
                    <th>Pelanggan</th>
                    <th>Jenis</th>
                    <th>Metode</th>
                    <th>Nominal</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

            <?php foreach($pembayaran as $p): ?>

                <tr>

                    <td>

                        <?= $p['no_invoice'] ?>

                    </td>

                    <td>
                        <?= $p['nama'] ?>
                    </td>

                    <td>

                        <?php if(
                            $p['jenis_pembayaran']
                            == 'DP'
                        ): ?>

                            <span
                                class="badge bg-warning">

                                DP

                            </span>

                        <?php else: ?>

                            <span
                                class="badge bg-success">

                                Pelunasan

                            </span>

                        <?php endif; ?>

                    </td>

                    <td>

                        <?php if($p['metode_pembayaran']=='Transfer'): ?>

                            <span class="badge bg-primary">
                                Transfer
                            </span>

                        <?php elseif($p['metode_pembayaran']=='QRIS'): ?>

                            <span class="badge bg-success">
                                QRIS
                            </span>

                        <?php else: ?>

                            <span class="badge bg-secondary">
                                Cash
                            </span>

                        <?php endif; ?>

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

                    <td>

                        <button
                            class="btn btn-info btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#detail<?= $p['id_pembayaran'] ?>">

                            Detail

                        </button>

                    </td>

                </tr>

            <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>

<?php foreach($pembayaran as $p): ?>

<div
    class="modal fade"
    id="detail<?= $p['id_pembayaran'] ?>">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">
                    Detail Pembayaran
                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <table class="table">

                    <tr>
                        <th>Invoice</th>
                        <td><?= $p['no_invoice'] ?></td>
                    </tr>

                    <tr>
                        <th>Nama Pelanggan</th>
                        <td><?= $p['nama'] ?></td>
                    </tr>

                    <tr>
                        <th>Jenis Pembayaran</th>
                        <td><?= $p['jenis_pembayaran'] ?></td>
                    </tr>

                    <tr>
                        <th>Metode</th>
                        <td><?= $p['metode_pembayaran'] ?></td>
                    </tr>

                    <tr>
                        <th>Nominal</th>
                        <td>
                            Rp <?= number_format($p['nominal'],0,',','.') ?>
                        </td>
                    </tr>

                    <tr>
                        <th>Tanggal Bayar</th>
                        <td><?= $p['tanggal_bayar'] ?></td>
                    </tr>

                </table>

            </div>

        </div>

    </div>

</div>

<?php endforeach; ?>

<?= $this->endSection() ?>