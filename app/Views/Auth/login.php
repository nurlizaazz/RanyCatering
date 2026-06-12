<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="utf-8">

<title>Login - Rany Catering</title>

<meta
    content="width=device-width, initial-scale=1.0"
    name="viewport">

<link
    href="<?= base_url('assets/restoran/img/favicon.ico'); ?>"
    rel="icon">

<link
    rel="preconnect"
    href="https://fonts.googleapis.com">

<link
    rel="preconnect"
    href="https://fonts.gstatic.com"
    crossorigin>

<link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
    rel="stylesheet">

<link
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
    rel="stylesheet">

<link
    href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap"
    rel="stylesheet">

<link
    href="<?= base_url('assets/restoran/css/bootstrap.min.css'); ?>"
    rel="stylesheet">

<link
    href="<?= base_url('assets/restoran/css/style.css'); ?>"
    rel="stylesheet">

<link
    rel="stylesheet"
    href="<?= base_url('assets/css/custom.css'); ?>" />


</head>

<body>

<div
    class="container auth-wrapper d-flex align-items-center justify-content-center">

<div class="col-lg-9 col-md-10">

    <div class="card auth-card">

        <div class="row g-0">

            <div
                class="col-lg-5 auth-left d-none d-lg-flex align-items-center justify-content-center">

                <div class="p-5">

                    <div
                        class="brand-title d-flex justify-content-center align-items-center"
                        style="height:100px;">

                        <i
                            class="fa fa-utensils fa-3x text-primary">
                        </i>

                    </div>

                    <h2 class="brand-title mb-3">

                        Rany Catering

                    </h2>

                </div>

            </div>

            <div class="col-lg-7 bg-white">

                <div class="p-5">

                    <div class="text-center mb-4">

                        <h3 class="mb-1">

                            LOGIN

                        </h3>

                        <p class="text-muted">

                            Silakan masuk ke akun Anda

                        </p>

                    </div>

                    <?php if(session()->getFlashdata('error')): ?>

                        <div class="alert alert-danger">

                            <?= session()->getFlashdata('error') ?>

                        </div>

                    <?php endif; ?>

                    <?php if(session()->getFlashdata('success')): ?>

                        <div class="alert alert-success">

                            <?= session()->getFlashdata('success') ?>

                        </div>

                    <?php endif; ?>

                    <form
                        action="<?= base_url('index.php/login-proses') ?>"
                        method="post">

                        <div class="mb-3">

                            <label class="form-label">

                                Username

                            </label>

                            <input
                                type="text"
                                name="username"
                                class="form-control"
                                placeholder="Masukkan username"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                Password

                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                placeholder="Masukkan password"
                                required>

                        </div>

                        <div class="d-grid mb-3">

                            <button
                                type="submit"
                                class="btn btn-primary">

                                Login

                            </button>

                        </div>

                    </form>

                    <div class="text-center">

                        <p class="mb-2">

                            Belum punya akun pelanggan?

                            <a
                                href="<?= base_url('index.php/register') ?>">

                                Daftar di sini

                            </a>

                        </p>

                        <a
                            href="<?= base_url('index.php') ?>">

                            Kembali ke Beranda

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
