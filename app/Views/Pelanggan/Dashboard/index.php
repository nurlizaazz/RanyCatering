<?= $this->extend('layout/pelanggan') ?>
<?= $this->section('content') ?>

<?php if($notifPelunasan > 0): ?>

<div class="alert alert-warning">

    <strong>

        🔔 Ada <?= $notifPelunasan ?>

        pesanan yang menunggu pelunasan.

    </strong>

    <br><br>

    <a
        href="<?= base_url(
            'index.php/pelanggan/catering/pesanan-saya'
        ) ?>"
        class="btn btn-warning btn-sm">

        Lihat Pesanan

    </a>

</div>

<?php endif; ?>
<div class="row">

    <div class="col-lg-12 mb-4">

        <div class="card">

            <div class="card-body">

                <h4>
                    Selamat Datang 👋
                </h4>

                <p class="mb-0">
                    Selamat datang di Sistem Pemesanan Rany Catering.
                </p>

            </div>

        </div>

    </div>

</div>

<div class="row">

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

                <h6>Pesanan DP</h6>

                <h2>
                    <?= $pesananDP ?>
                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-4">

        <div class="card">

            <div class="card-body">

                <h6>Pesanan Lunas</h6>

                <h2>
                    <?= $pesananLunas ?>
                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-4">

        <div class="card">

            <div class="card-body">

                <h6>Keranjang</h6>

                <h2>
                    <?= $keranjang ?>
                </h2>

            </div>

        </div>

    </div>

</div>

<?= $this->endSection() ?>