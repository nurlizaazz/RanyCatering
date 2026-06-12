<?= $this->extend('layout/owner') ?>
<?= $this->section('content') ?>

<div class="row">

    <div class="col-md-4">

        <div class="card">

            <div class="card-body">

                <h6>Total Pesanan</h6>

                <h2>

                    <?= $totalPesanan ?>

                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card">

            <div class="card-body">

                <h6>Total Pelanggan</h6>

                <h2>

                    <?= $totalPelanggan ?>

                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card">

            <div class="card-body">

                <h6>Total Pendapatan</h6>

                <h2>

                    Rp <?= number_format(
                        $totalPendapatan,
                        0,
                        ',',
                        '.'
                    ) ?>

                </h2>

            </div>

        </div>

    </div>

</div>

<?= $this->endSection() ?>