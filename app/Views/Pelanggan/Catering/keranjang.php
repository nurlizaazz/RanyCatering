<?= $this->extend('layout/pelanggan') ?>
<?= $this->section('content') ?>

<div class="container mt-4">

    <div class="card">

        <div class="card-header">
            <h3>Keranjang</h3>
        </div>

        <div class="card-body">

            <?php if(!empty($keranjang)): ?>

                <?php foreach($keranjang as $index => $k): ?>

                    <div class="border p-3 mb-3">

                        <h5>
                            <?= $k['nama_paket'] ?>
                        </h5>

                        <p>
                            <strong>Menu:</strong>
                        </p>

                        <ul>

                            <?php foreach($k['nama_menu'] as $menu): ?>

                                <li>
                                    <?= $menu ?>
                                </li>

                            <?php endforeach; ?>

                        </ul>

                        <p>
                            <strong>Jumlah Porsi:</strong>
                            <?= $k['jumlah_porsi'] ?>
                        </p>

                        <a href="<?= base_url('index.php/pelanggan/catering/hapus-keranjang/'.$index) ?>"
                        class="btn btn-danger btn-sm">

                            Hapus

                        </a>

                    </div>

                <?php endforeach; ?><hr>

                    <a href="<?= base_url('index.php/pelanggan/catering/checkout') ?>"
                    class="btn btn-success">

                        Checkout

                    </a>



            <?php else: ?>

                <div class="alert alert-warning">
                    Keranjang masih kosong.
                </div>

            <?php endif; ?>

        </div>

    </div>

</div>

<?= $this->endSection() ?>