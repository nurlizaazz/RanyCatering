<?= $this->extend('layout/pelanggan') ?>
<?= $this->section('content') ?>

<div class="card">

    <div class="card-header">

        <h5 class="mb-0">

            Profil Saya

        </h5>

    </div>

    <div class="card-body">

        <?php if(session()->getFlashdata('success')): ?>

            <div class="alert alert-success">

                <?= session()->getFlashdata('success') ?>

            </div>

        <?php endif; ?>

        <form
            action="<?= base_url('index.php/pelanggan/profil/update') ?>"
            method="post">

            <input
                type="hidden"
                name="id_pelanggan"
                value="<?= $pelanggan['id_pelanggan'] ?>">

            <div class="mb-3">

                <label class="form-label">

                    Nama

                </label>

                <input
                    type="text"
                    name="nama"
                    class="form-control"
                    value="<?= $pelanggan['nama'] ?>"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    No HP

                </label>

                <input
                    type="text"
                    name="no_hp"
                    class="form-control"
                    value="<?= $pelanggan['no_hp'] ?>"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Alamat

                </label>

                <textarea
                    name="alamat"
                    rows="4"
                    class="form-control"
                    required><?= $pelanggan['alamat'] ?></textarea>

            </div>

            <button
                type="submit"
                class="btn btn-primary">

                Simpan Perubahan

            </button>

        </form>

    </div>

</div>

<?= $this->endSection() ?>