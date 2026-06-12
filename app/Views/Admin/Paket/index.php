<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="card">

    <div class="card-header d-flex justify-content-between">

        <h5>Paket Catering</h5>

        <button
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#modalTambah">

            Tambah Paket

        </button>

    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <thead>

                <tr>

                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama Paket</th>
                    <th>Harga Porsi</th>
                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

            <?php $no=1; ?>

            <?php foreach($paket as $p): ?>

                <tr>

                    <td><?= $no++ ?></td>

                    <td>

                        <?php if($p['gambar']) : ?>

                            <img
                                src="<?= base_url('uploads/paket/'.$p['gambar']) ?>"
                                width="80">

                        <?php endif; ?>

                    </td>

                    <td>
                        <?= $p['nama_paket'] ?>
                    </td>

                    <td>

                        Rp <?= number_format(
                            $p['harga_porsi'],
                            0,
                            ',',
                            '.'
                        ) ?>

                    </td>

                    <td>

                        <a
                            class="btn btn-warning btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#edit<?= $p['id_paket'] ?>">

                            Edit

                        </a>

                        <a
                            class="btn btn-danger btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#hapus<?= $p['id_paket'] ?>">

                            Hapus

                        </a>

                    </td>

                </tr>

            <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>

<div class="modal fade"
     id="modalTambah">

    <div class="modal-dialog">

        <div class="modal-content">

            <form action="<?= base_url('index.php/admin/paket/simpan') ?>"
                  method="post"
                  enctype="multipart/form-data">

                <div class="modal-header">

                    <h5>Tambah Paket</h5>

                </div>

                <div class="modal-body">

                    Nama Paket

                    <input
                        type="text"
                        name="nama_paket"
                        class="form-control">

                    <br>

                    Harga Porsi

                    <input
                        type="number"
                        name="harga_porsi"
                        class="form-control">

                    <br>

                    Deskripsi

                    <textarea
                        name="deskripsi"
                        class="form-control"></textarea>

                    <br>

                    Gambar

                    <input
                        type="file"
                        name="gambar"
                        class="form-control">

                </div>

                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">

                        Batal

                    </button>

                    <button
                        type="submit"
                        class="btn btn-primary">

                        Simpan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<?php foreach($paket as $p): ?>

<div class="modal fade"
     id="edit<?= $p['id_paket'] ?>"
     tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <form
                action="<?= base_url('index.php/admin/paket/update/'.$p['id_paket']) ?>"
                method="post"
                enctype="multipart/form-data">

                <div class="modal-header">

                    <h5 class="modal-title">

                        Edit Paket

                    </h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                    </button>

                </div>

                <div class="modal-body">

                    <div class="mb-3">

                        <label>Nama Paket</label>

                        <input
                            type="text"
                            name="nama_paket"
                            class="form-control"
                            value="<?= $p['nama_paket'] ?>">

                    </div>

                    <div class="mb-3">

                        <label>Harga Porsi</label>

                        <input
                            type="number"
                            name="harga_porsi"
                            class="form-control"
                            value="<?= $p['harga_porsi'] ?>">

                    </div>

                    <div class="mb-3">

                        <label>Deskripsi</label>

                        <textarea
                            name="deskripsi"
                            class="form-control"><?= $p['deskripsi'] ?></textarea>

                    </div>

                    <div class="mb-3">

                        <label>Gambar Baru</label>

                        <input
                            type="file"
                            name="gambar"
                            class="form-control">

                    </div>

                    <?php if($p['gambar']) : ?>

                        <img
                            src="<?= base_url('uploads/paket/'.$p['gambar']) ?>"
                            width="120">

                    <?php endif; ?>

                </div>

                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">

                        Batal

                    </button>

                    <button
                        type="submit"
                        class="btn btn-primary">

                        Update

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<?php endforeach; ?>

<?php foreach($paket as $p): ?>

<div
    class="modal fade"
    id="hapus<?= $p['id_paket'] ?>"
    tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header bg-danger">

                <h5 class="modal-title text-white">

                    Konfirmasi Hapus

                </h5>

                <button
                    type="button"
                    class="btn-close btn-close-white"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body text-center">

                <i class="bx bx-trash text-danger"
                   style="font-size:70px;">
                </i>

                <h5 class="mt-3">

                    Hapus Paket?

                </h5>

                <p>

                    Paket

                    <b>
                        <?= $p['nama_paket'] ?>
                    </b>

                    akan dihapus permanen.

                </p>

            </div>

            <div class="modal-footer justify-content-center">

                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">

                    Batal

                </button>

                <a
                    href="<?= base_url('index.php/admin/paket/hapus/'.$p['id_paket']) ?>"
                    class="btn btn-danger">

                    Ya, Hapus

                </a>

            </div>

        </div>

    </div>

</div>

<?php endforeach; ?>


<?= $this->endSection() ?>