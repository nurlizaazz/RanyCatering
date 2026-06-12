<!doctype html>
<html
    lang="en"
    class="layout-menu-fixed layout-compact"
    data-assets-path="<?= base_url('assets/sneat/'); ?>"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title><?= $title ?? 'Owner Rany Catering'; ?></title>

    <link rel="stylesheet" href="<?= base_url('assets/sneat/vendor/fonts/iconify-icons.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/sneat/vendor/fonts/boxicons.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/sneat/vendor/css/core.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/sneat/css/demo.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/sneat/vendor/libs/perfect-scrollbar/perfect-scrollbar.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/custom.css'); ?>" />

    <script src="<?= base_url('assets/sneat/vendor/js/helpers.js'); ?>"></script>
    <script src="<?= base_url('assets/sneat/js/config.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

<div class="layout-wrapper layout-content-navbar">
<div class="layout-container">

    <!-- Sidebar -->
    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

        <div class="app-brand demo">

            <a href="<?= base_url('index.php/pelanggan/dashboard'); ?>"
               class="app-brand-link">

                <div class="d-flex align-items-center">

                <i class="bx bx-restaurant text-warning fs-1 me-3"></i>

                <span class="fw-bold logo-text">

                    RanyCatering

                </span>

            </div>

            </a>

            <a href="javascript:void(0);"
               class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">

                <i class="bx bx-chevron-left bx-sm align-middle"></i>

            </a>

        </div>

        <div class="menu-divider mt-0"></div>

        <div class="menu-inner-shadow"></div>

      <ul class="menu-inner py-1">

        <li class="menu-item <?= uri_string() == 'owner/dashboard' ? 'active' : ''; ?>">

            <a href="<?= base_url('index.php/owner/dashboard'); ?>"
            class="menu-link">

                <i class="menu-icon bx bx-home-smile"></i>

                <div>Dashboard</div>

            </a>

        </li>

        <li class="menu-header small text-uppercase">

            <span class="menu-header-text">

                Laporan

            </span>

        </li>

        <li class="menu-item <?= uri_string() == 'owner/pemesanan' ? 'active' : ''; ?>">

            <a href="<?= base_url('index.php/owner/pemesanan'); ?>"
            class="menu-link">

                <i class="menu-icon bx bx-file"></i>

                <div>Laporan Pemesanan</div>

            </a>

        </li>

        <li class="menu-item <?= uri_string() == 'owner/pendapatan' ? 'active' : ''; ?>">

            <a href="<?= base_url('index.php/owner/pendapatan'); ?>"
            class="menu-link">

                <i class="menu-icon bx bx-money"></i>

                <div>Laporan Pendapatan</div>

            </a>

        </li>

        <li class="menu-header small text-uppercase">

            <span class="menu-header-text">

                Akun

            </span>

        </li>

        <li class="menu-item">

            <a href="<?= base_url('index.php/logout'); ?>"
            class="menu-link">

                <i class="menu-icon bx bx-log-out"></i>

                <div>Logout</div>

            </a>

        </li>

    </ul>
    </aside>

    <!-- /Sidebar -->

    <div class="layout-page">

        <!-- Navbar -->

        <nav
            class="layout-navbar container-xxl navbar-detached navbar navbar-expand-xl align-items-center bg-navbar-theme"
            id="layout-navbar">

            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">

                <a class="nav-item nav-link px-0 me-xl-6"
                   href="javascript:void(0)">

                    <i class="bx bx-menu bx-md"></i>

                </a>

            </div>

            <div class="navbar-nav-right d-flex align-items-center justify-content-between"
                 id="navbar-collapse">

                <!-- Search -->

                <div class="navbar-nav align-items-center">

                    <div class="nav-item d-flex align-items-center">

                        <i class="bx bx-search bx-md"></i>

                        <input
                            type="text"
                            class="form-control border-0 shadow-none ps-2"
                            placeholder="Search..."
                            aria-label="Search..." />

                    </div>

                </div>

                <!-- Right -->

                <ul class="navbar-nav flex-row align-items-center ms-auto">

                    

                    <!-- User -->

                    <li class="nav-item navbar-dropdown dropdown-user dropdown">

                        <a class="nav-link dropdown-toggle hide-arrow p-0"
                           href="javascript:void(0);"
                           data-bs-toggle="dropdown">

                            <div class="avatar avatar-online">

                                <img
                                    src="<?= base_url('assets/sneat/img/avatars/1.png'); ?>"
                                    alt
                                    class="w-px-40 h-auto rounded-circle" />

                            </div>

                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">

                            <li>

                                <a class="dropdown-item" href="#">

                                    <div class="d-flex">

                                        <div class="flex-shrink-0 me-3">

                                            <div class="avatar avatar-online">

                                                <img
                                                    src="<?= base_url('assets/sneat/img/avatars/1.png'); ?>"
                                                    alt
                                                    class="w-px-40 h-auto rounded-circle" />

                                            </div>

                                        </div>

                                        <div class="flex-grow-1">

                                            <h6 class="mb-0">

                                                <?= session()->get('username') ; ?>

                                            </h6>

                                            <small class="text-body-secondary">

                                                Owner

                                            </small>

                                        </div>

                                    </div>

                                </a>

                            </li>

                            <li>
                                <div class="dropdown-divider my-1"></div>
                            </li>

                            

                            <li>
                                <div class="dropdown-divider"></div>
                            </li>

                            <li>

                                <a class="dropdown-item"
                                href="<?= base_url('index.php/logout'); ?>">

                                    <i class="bx bx-power-off me-3"></i>

                                    Logout

                                </a>

                            </li>
                        </ul>

                    </li>

                </ul>

            </div>

        </nav>

        <!-- Content -->

        <div class="content-wrapper">

            <div class="container-xxl flex-grow-1 container-p-y">

                <?= $this->renderSection('content'); ?>

            </div>

            <!-- Footer -->

            <footer class="content-footer footer bg-footer-theme">

                <div class="container-xxl">

                    <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">

                        <div>

                            © <?= date('Y'); ?>

                            Rany Catering

                        </div>

                    </div>

                </div>

            </footer>

            <div class="content-backdrop fade"></div>

        </div>

    </div>

</div>
</div>

<div class="layout-overlay layout-menu-toggle"></div>

<?php if(session()->getFlashdata('success')) : ?>

<script>

Swal.fire({

    icon: 'success',

    title: 'Berhasil',

    text: '<?= session()->getFlashdata('success') ?>',

    showConfirmButton: false,

    timer: 1800

});

</script>

<?php endif; ?>

<script src="<?= base_url('assets/sneat/vendor/libs/jquery/jquery.js'); ?>"></script>
<script src="<?= base_url('assets/sneat/vendor/libs/popper/popper.js'); ?>"></script>
<script src="<?= base_url('assets/sneat/vendor/js/bootstrap.js'); ?>"></script>
<script src="<?= base_url('assets/sneat/vendor/libs/perfect-scrollbar/perfect-scrollbar.js'); ?>"></script>
<script src="<?= base_url('assets/sneat/vendor/js/menu.js'); ?>"></script>
<script src="<?= base_url('assets/sneat/vendor/libs/apex-charts/apexcharts.js'); ?>"></script>
<script src="<?= base_url('assets/sneat/js/main.js'); ?>"></script>

<?= $this->renderSection('script'); ?>

</body>
</html>