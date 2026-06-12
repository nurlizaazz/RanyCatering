<?= $this->extend('layout/pelanggan') ?>
<?= $this->section('content') ?>

<div class="container mt-4">

    <div class="card">

        <div class="card-header">
            <h3>Pilih Menu - <?= esc($paket['nama_paket']) ?></h3>
        </div>

        <div class="card-body">

            <?php if (!empty($menu)): ?>

                <form action="<?= base_url('index.php/pelanggan/catering/tambah-keranjang') ?>" method="post">

                    <input
                        type="hidden"
                        name="id_paket"
                        value="<?= $paket['id_paket'] ?>">

                    <?php foreach ($menu as $m): ?>

                        <div class="form-check mb-3">

                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="menu[]"
                                value="<?= $m['id_menu'] ?>"
                                id="menu<?= $m['id_menu'] ?>">

                            <label
                                class="form-check-label"
                                for="menu<?= $m['id_menu'] ?>">

                                <strong>
                                    <?= esc($m['nama_menu']) ?>
                                </strong>

                                <br>

                                <small>
                                    <?= esc($m['deskripsi']) ?>
                                </small>

                                <br>

                                <small>
                                    Tambahan :
                                    Rp <?= number_format($m['harga_tambahan'], 0, ',', '.') ?>
                                </small>

                            </label>

                        </div>

                    <?php endforeach; ?>

                    <hr>

                    <div class="mb-3">
                        <label class="form-label">
                            Jumlah Porsi
                        </label>

                        <input
                            type="number"
                            name="jumlah_porsi"
                            class="form-control"
                            min="1"
                            required>
                    </div>

                

                    <button
                        type="submit"
                        class="btn btn-primary">

                        Tambah ke Keranjang

                    </button>

                </form>

            <?php else: ?>

                <div class="alert alert-warning">
                    Belum ada menu untuk paket ini.
                </div>

            <?php endif; ?>

        </div>

    </div>

</div>

<?= $this->endSection() ?>