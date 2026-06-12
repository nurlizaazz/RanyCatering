<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <title>Register - Rany Catering</title>

    <meta
        content="width=device-width, initial-scale=1.0"
        name="viewport">

    <link
        href="<?= base_url('assets/restoran/img/favicon.ico'); ?>"
        rel="icon">

    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
        rel="stylesheet">

    <link
        href="<?= base_url('assets/restoran/css/bootstrap.min.css'); ?>"
        rel="stylesheet">

    <link
        href="<?= base_url('assets/restoran/css/style.css'); ?>"
        rel="stylesheet">

</head>

<body>

<div
    class="container auth-wrapper d-flex align-items-center justify-content-center">

    <div class="col-lg-10">

        <div class="card auth-card">

            <div class="row g-0">

                <div
                    class="col-lg-5 auth-left d-none d-lg-flex align-items-center justify-content-center">

                    <div class="p-5 text-center">

                        <i
                            class="fa fa-utensils fa-3x text-primary">
                        </i>

                        <h2 class="mt-3">

                            Rany Catering

                        </h2>

                    </div>

                </div>

                <div class="col-lg-7 bg-white">

                    <div class="p-5">

                        <h3 class="text-center mb-4">

                            REGISTER

                        </h3>

                        <?php if(session()->getFlashdata('error')): ?>

                            <div class="alert alert-danger">

                                <?= session()->getFlashdata('error') ?>

                            </div>

                        <?php endif; ?>

                        <form
                            action="<?= base_url('index.php/register-proses') ?>"
                            method="post">

                            <div class="mb-3">

                                <label>

                                    Nama Lengkap

                                </label>

                                <input
                                    type="text"
                                    name="nama"
                                    class="form-control"
                                    value="<?= old('nama') ?>"
                                    required>

                            </div>

                            <div class="mb-3">

                                <label>

                                    No HP

                                </label>

                                <input
                                    type="text"
                                    name="no_hp"
                                    class="form-control"
                                    value="<?= old('no_hp') ?>"
                                    required>

                            </div>

                            <div class="mb-3">

                                <label>

                                    Alamat

                                </label>

                                <textarea
                                    name="alamat"
                                    class="form-control"
                                    required><?= old('alamat') ?></textarea>

                            </div>

                            <div class="mb-3">

                                <label>

                                    Username

                                </label>

                                <input
                                    type="text"
                                    name="username"
                                    class="form-control"
                                    value="<?= old('username') ?>"
                                    required>

                            </div>

                            <div class="mb-3">

                                <label>

                                    Password

                                </label>

                                <input
                                    type="password"
                                    name="password"
                                    class="form-control"
                                    required>

                            </div>

                            <div class="mb-3">

                                <label>

                                    Konfirmasi Password

                                </label>

                                <input
                                    type="password"
                                    name="konfirmasi_password"
                                    class="form-control"
                                    required>

                            </div>

                            <button
                                type="submit"
                                class="btn btn-primary w-100">

                                Daftar

                            </button>

                        </form>

                        <div class="text-center mt-3">

                            Sudah punya akun?

                            <a
                                href="<?= base_url('index.php/login') ?>">

                                Login

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="<?= base_url('assets/restoran/js/bootstrap.bundle.min.js'); ?>"></script>

</body>

</html>