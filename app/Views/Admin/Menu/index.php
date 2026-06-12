<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="card">

    <div class="card-header d-flex justify-content-between">

        <h5>Data Menu</h5>

        <button
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#modalTambah">

            Tambah Menu

        </button>

    </div>

    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead>

                <tr>

                    <th>No</th>
                    <th>Gambar</th>
                    <th>Paket</th>
                    <th>Nama Menu</th>
                    <th>Harga Tambahan</th>
                    <th>Status</th>
                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

            <?php $no=1; ?>

            <?php foreach($menu as $m): ?>

                <tr>

                    <td><?= $no++ ?></td>

                    <td>

                        <?php if($m['gambar']) : ?>

                            <img
                                src="<?= base_url('uploads/menu/'.$m['gambar']) ?>"
                                width="80">

                        <?php endif; ?>

                    </td>

                    <td>
                        <?= $m['nama_paket'] ?>
                    </td>

                    <td>
                        <?= $m['nama_menu'] ?>
                    </td>

                    <td>

                        Rp <?= number_format(
                            $m['harga_tambahan'],
                            0,
                            ',',
                            '.'
                        ) ?>

                    </td>

                    <td>

                        <?php if($m['status']=='aktif'): ?>

                            <span class="badge bg-success">
                                Aktif
                            </span>

                        <?php else: ?>

                            <span class="badge bg-danger">
                                Nonaktif
                            </span>

                        <?php endif; ?>

                    </td>

                    <td>

                        <a
                            class="btn btn-warning btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#edit<?= $m['id_menu'] ?>">

                            Edit

                        </a>

                        <a
                            class="btn btn-danger btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#hapus<?= $m['id_menu'] ?>">

                            Hapus

                        </a>

                    </td>

                </tr>

            <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>

<!-- Modal Tambah -->

<div class="modal fade"
     id="modalTambah">

    <div class="modal-dialog">

        <div class="modal-content">

            <form
                action="<?= base_url('index.php/admin/menu/simpan') ?>"
                method="post"
                enctype="multipart/form-data">

                <div class="modal-header">

                    <h5>Tambah Menu</h5>

                </div>

                <div class="modal-body">

                    <div class="mb-3">

                        <label>Paket</label>

                        <select
                            name="id_paket"
                            class="form-control"
                            required>

                            <option value="">
                                Pilih Paket
                            </option>

                            <?php foreach($paket as $p): ?>

                                <option value="<?= $p['id_paket'] ?>">

                                    <?= $p['nama_paket'] ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <div class="mb-3">

                        <label>Nama Menu</label>

                        <input
                            type="text"
                            name="nama_menu"
                            class="form-control"
                            required>

                    </div>

                    <div class="mb-3">

                        <label>Deskripsi</label>

                        <textarea
                            name="deskripsi"
                            class="form-control"></textarea>

                    </div>

                    <div class="mb-3">

                        <label>Harga Tambahan</label>

                        <input
                            type="number"
                            name="harga_tambahan"
                            class="form-control"
                            value="0">

                    </div>

                    <div class="mb-3">

                        <label>Status</label>

                        <select
                            name="status"
                            class="form-control">

                            <option value="aktif">
                                Aktif
                            </option>

                            <option value="nonaktif">
                                Nonaktif
                            </option>

                        </select>

                    </div>

                    <div class="mb-3">

                        <label>Gambar</label>

                        <input
                            type="file"
                            name="gambar"
                            class="form-control">

                    </div>

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

<?php foreach($menu as $m): ?>

<div class="modal fade"
     id="edit<?= $m['id_menu'] ?>"
     tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <form
                action="<?= base_url('index.php/admin/menu/update/'.$m['id_menu']) ?>"
                method="post"
                enctype="multipart/form-data">

                <div class="modal-header">

                    <h5 class="modal-title">
                        Edit Menu
                    </h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                    </button>

                </div>

                <div class="modal-body">

                    <div class="mb-3">

                        <label>Paket</label>

                        <select
                            name="id_paket"
                            class="form-control">

                            <?php foreach($paket as $p): ?>

                                <option
                                    value="<?= $p['id_paket'] ?>"
                                    <?= $p['id_paket']==$m['id_paket'] ? 'selected' : '' ?>>

                                    <?= $p['nama_paket'] ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <div class="mb-3">

                        <label>Nama Menu</label>

                        <input
                            type="text"
                            name="nama_menu"
                            class="form-control"
                            value="<?= $m['nama_menu'] ?>">

                    </div>

                    <div class="mb-3">

                        <label>Deskripsi</label>

                        <textarea
                            name="deskripsi"
                            class="form-control"><?= $m['deskripsi'] ?></textarea>

                    </div>

                    <div class="mb-3">

                        <label>Harga Tambahan</label>

                        <input
                            type="number"
                            name="harga_tambahan"
                            class="form-control"
                            value="<?= $m['harga_tambahan'] ?>">

                    </div>

                    <div class="mb-3">

                        <label>Status</label>

                        <select
                            name="status"
                            class="form-control">

                            <option
                                value="aktif"
                                <?= $m['status']=='aktif' ? 'selected' : '' ?>>

                                Aktif

                            </option>

                            <option
                                value="nonaktif"
                                <?= $m['status']=='nonaktif' ? 'selected' : '' ?>>

                                Nonaktif

                            </option>

                        </select>

                    </div>

                    <div class="mb-3">

                        <label>Gambar Baru</label>

                        <input
                            type="file"
                            name="gambar"
                            class="form-control">

                    </div>

                    <?php if($m['gambar']) : ?>

                        <img
                            src="<?= base_url('uploads/menu/'.$m['gambar']) ?>"
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

<?php foreach($menu as $m): ?>

<div
    class="modal fade"
    id="hapus<?= $m['id_menu'] ?>"
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

                    Hapus Menu?

                </h5>

                <p>

                    Menu

                    <b>
                        <?= $m['nama_menu'] ?>
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
                    href="<?= base_url('index.php/admin/menu/hapus/'.$m['id_menu']) ?>"
                    class="btn btn-danger">

                    Ya, Hapus

                </a>

            </div>

        </div>

    </div>

</div>

<?php endforeach; ?>

<?= $this->endSection() ?>