<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="row">

    <div class="col-lg-12 mb-4">

        <div class="card">

            <div class="card-body">

                <h4>

                    Selamat Datang Admin 👋

                </h4>

                <p>

                    Kelola data catering melalui dashboard admin.

                </p>

            </div>

        </div>

    </div>

</div>

<div class="row">

    <div class="col-md-3 mb-4">

        <div class="card">

            <div class="card-body">

                <h6>Total Paket</h6>

                <h2>
                    <?= $totalPaket ?>
                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-4">

        <div class="card">

            <div class="card-body">

                <h6>Total Menu</h6>

                <h2>
                    <?= $totalMenu ?>
                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-4">

        <div class="card">

            <div class="card-body">

                <h6>Total Pesanan</h6>

                <h2>
                    <?= $totalPesanan ?>
                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-4">

        <div class="card">

            <div class="card-body">

                <h6>Total Pembayaran</h6>

                <h2>
                    <?= $totalPembayaran ?>
                </h2>

            </div>

        </div>

    </div>

</div>

<?= $this->endSection() ?>