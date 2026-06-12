<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="card">

    <div class="card-header">

        <h5>Data Pemesanan</h5>

    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <thead>

                <tr>

                    <th>Invoice</th>
                    <th>Pelanggan</th>
                    <th>Tanggal Acara</th>
                    <th>Total</th>
                    <th>Pembayaran</th>
                    <th>Status Pesanan</th>
                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

            <?php foreach($pemesanan as $p): ?>

                <tr>

                    <td>
                        <?= $p['no_invoice'] ?>
                    </td>

                    <td>
                        <?= $p['nama'] ?>
                    </td>

                    <td>
                        <?= $p['tanggal_acara'] ?>
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
                        <?= $p['status_pembayaran'] ?>
                    </td>

                    <td>
                        <?= $p['status_pesanan'] ?>
                    </td>

                    <td>

                        <button
                            class="btn btn-primary btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#detail<?= $p['id_pemesanan'] ?>">

                            Detail

                        </button>

                    </td>

                </tr>

            <?php endforeach; ?>

            </tbody>

        </table>

        <?php foreach($pemesanan as $p): ?>

<?php foreach($pemesanan as $p): ?>

<div
    class="modal fade"
    id="detail<?= $p['id_pemesanan'] ?>"
    tabindex="-1">

```
<div class="modal-dialog">

    <div class="modal-content">

        <form
            action="<?= base_url('index.php/admin/pemesanan/update-status/'.$p['id_pemesanan']) ?>"
            method="post">

            <div class="modal-header">

                <h5 class="modal-title">
                    Detail Pemesanan
                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <p>
                    <b>Invoice :</b>
                    <?= $p['no_invoice'] ?>
                </p>

                <p>
                    <b>Pelanggan :</b>
                    <?= $p['nama'] ?>
                </p>

                <p>
                    <b>Tanggal Acara :</b>
                    <?= $p['tanggal_acara'] ?>
                </p>

                <p>
                    <b>Total Tagihan :</b>
                    Rp <?= number_format(
                        $p['total_tagihan'],
                        0,
                        ',',
                        '.'
                    ) ?>
                </p>

                <p>
                    <b>Status Pembayaran :</b>

                    <?php if($p['status_pembayaran'] == 'Belum Bayar'): ?>

                        <span class="badge bg-danger">
                            Belum Bayar
                        </span>

                    <?php elseif($p['status_pembayaran'] == 'DP'): ?>

                        <span class="badge bg-warning">
                            DP
                        </span>

                    <?php else: ?>

                        <span class="badge bg-success">
                            Lunas
                        </span>

                    <?php endif; ?>

                </p>

                <hr>

                <label class="form-label">

                    Status Pesanan

                </label>

                <?php if($p['status_pembayaran'] == 'Belum Bayar'): ?>

                    <div class="alert alert-danger">

                        Menunggu pembayaran DP
                        dari pelanggan.

                    </div>

                <?php else: ?>

                    <select
                        name="status_pesanan"
                        class="form-select">

                        <option
                            value="Diproses"
                            <?= $p['status_pesanan']=='Diproses' ? 'selected' : '' ?>>

                            Diproses

                        </option>

                        <option
                            value="Dimasak"
                            <?= $p['status_pesanan']=='Dimasak' ? 'selected' : '' ?>>

                            Dimasak

                        </option>

                        <option
                            value="Diantar"
                            <?= $p['status_pesanan']=='Diantar' ? 'selected' : '' ?>>

                            Diantar

                        </option>

                        <option
                            value="Selesai"
                            <?= $p['status_pesanan']=='Selesai' ? 'selected' : '' ?>>

                            Selesai

                        </option>

                    </select>

                <?php endif; ?>

            </div>

            <div class="modal-footer">

                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">

                    Tutup

                </button>

                <?php if($p['status_pembayaran'] != 'Belum Bayar'): ?>

                    <button
                        type="submit"
                        class="btn btn-primary">

                        Simpan

                    </button>

                <?php endif; ?>

            </div>

        </form>

    </div>

</div>
```

</div>

<?php endforeach; ?>

<?php endforeach; ?>

<?= $this->endSection() ?>

    </div>

</div>