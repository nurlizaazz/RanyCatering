<?= $this->extend('layout/pelanggan') ?>
<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <h4>Daftar Paket Catering</h4>
        </div>

        <div class="card-body">

            <div class="row">

                <?php foreach($paket as $p): ?>

                    <div class="col-md-3 mb-4">

                        <div class="card h-100 shadow-sm">

                            <div class="card-body">

                                <h5 class="card-title">
                                    <?= esc($p['nama_paket']) ?>
                                </h5>

                                <p>
                                    <?= esc($p['deskripsi']) ?>
                                </p>

                                <h6>
                                    Rp <?= number_format($p['harga_porsi'],0,',','.') ?>
                                    / porsi
                                </h6>

                               <a href="<?= base_url('index.php/pelanggan/catering/menu/'.$p['id_paket']) ?>"
                                class="btn btn-primary">

                                    Pilih Paket

                                </a>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        </div>
    </div>

</div>

<?= $this->endSection() ?>