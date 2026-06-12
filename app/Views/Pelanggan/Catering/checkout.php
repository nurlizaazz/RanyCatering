<?= $this->extend('layout/pelanggan') ?>
<?= $this->section('content') ?>

<div class="container mt-4">

    <div class="card">

        <div class="card-header">
            <h3>Checkout Pesanan</h3>
        </div>

        <div class="card-body">

            <form action="<?= base_url('index.php/pelanggan/catering/proses-checkout') ?>" method="post">

                <div class="mb-3">
                    <label>Tanggal Acara</label>
                    <input type="date"
                           name="tanggal_acara"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label>Alamat Acara</label>
                    <textarea name="alamat_acara"
                              class="form-control"
                              rows="3"
                              required></textarea>
                </div>

                <button type="submit"
                        class="btn btn-success">

                    Proses Pesanan

                </button>

            </form>

        </div>

    </div>

</div>

<?= $this->endSection() ?>