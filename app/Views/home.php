<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $title ?? 'Rany Catering'; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="<?= base_url('assets/restoran/img/favicon.ico'); ?>" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link 
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" 
        rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="<?= base_url('assets/restoran/lib/animate/animate.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/restoran/lib/owlcarousel/assets/owl.carousel.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/restoran/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css'); ?>" rel="stylesheet">
    
    <link href="<?= base_url('assets/restoran/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/restoran/css/style.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/custom.css'); ?>" />
</head>

<body>
    <div class="container-fluid bg-white p-0">

        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <div class="container-fluid position-relative p-0" id="home">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="<?= base_url('index.php'); ?>" class="navbar-brand p-0">
                    <h1 class="text-primary m-0">
                        <i class="fa fa-utensils me-3"></i>RanyCatering
                    </h1>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="<?= base_url('index.php'); ?>" class="nav-item nav-link active">Home</a>
                        <a href="#tentang" class="nav-item nav-link">Tentang</a>
                        <a href="#layanan" class="nav-item nav-link">Layanan</a>
                        <a href="#menu" class="nav-item nav-link">Menu</a>
                    </div>

                    <?php if (session()->get('logged_in') == true && session()->get('role') == 'pelanggan') : ?>
                        <a href="<?= base_url('index.php/pelanggan/dashboard'); ?>" class="btn btn-primary py-2 px-4">
                            Dashboard
                        </a>
                    <?php else : ?>
                        <a href="<?= base_url('index.php/login'); ?>" class="btn btn-primary py-2 px-4">
                            Login / Pesan
                        </a>
                    <?php endif; ?>
                </div>
            </nav>


<div class="container-fluid bg-dark hero-header " >
    <div class="container-fluid p-1" id="home">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 text-center text-lg-start">
                <h1 class="display-3 text-white animated slideInLeft">
                    Pesan Catering<br>Lebih Mudah
                </h1>

                <p class="text-white animated slideInLeft mb-4 pb-2">
                    Rany Catering menyediakan berbagai pilihan paket makanan untuk acara keluarga,
                    kantor, nasi box, snack box, dan prasmanan.
                </p>

                <a href="#menu" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">
                    Lihat Menu
                </a>
            </div>

            <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                <img class="img-fluid" src="<?= base_url('assets/restoran/img/hero.png'); ?>" alt="Rany Catering" style="
        width:100%;
        max-height:100%;
        object-fit:cover;">
            </div>
        </div>
    </div>
</div>



<div class="container-xxl py-5" id="layanan">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-sm-6 wow fadeInUp">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-utensils text-primary mb-4"></i>
                        <h5>Menu Catering</h5>
                        <p>Pelanggan dapat melihat menu dan paket catering yang tersedia.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 wow fadeInUp">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-cart-plus text-primary mb-4"></i>
                        <h5>Pemesanan Online</h5>
                        <p>Pelanggan dapat melakukan pemesanan catering secara online.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 wow fadeInUp">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-qrcode text-primary mb-4"></i>
                        <h5>Cash / QRIS</h5>
                        <p>Pembayaran dapat dilakukan menggunakan metode cash atau QRIS.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 wow fadeInUp">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                        <h5>Admin Support</h5>
                        <p>Admin dapat memproses pesanan dan mengubah status pesanan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container-xxl py-5" id="tentang">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-6 text-start">
                        <img class="img-fluid rounded w-100" src="<?= base_url('assets/restoran/img/about-1.jpg'); ?>">
                    </div>
                    <div class="col-6 text-start">
                        <img class="img-fluid rounded w-75" src="<?= base_url('assets/restoran/img/about-2.jpg'); ?>" style="margin-top: 25%;">
                    </div>
                    <div class="col-6 text-end">
                        <img class="img-fluid rounded w-75" src="<?= base_url('assets/restoran/img/about-3.jpg'); ?>">
                    </div>
                    <div class="col-6 text-end">
                        <img class="img-fluid rounded w-100" src="<?= base_url('assets/restoran/img/about-4.jpg'); ?>">
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <h5 class="section-title ff-secondary text-start text-primary fw-normal">Tentang Kami</h5>
                <h1 class="mb-4">
                    Selamat Datang di <i class="fa fa-utensils text-primary me-2"></i>Rany Catering
                </h1>

                <p class="mb-4">
                    Rany Catering adalah sistem informasi pemesanan catering yang membantu pelanggan
                    memilih menu, melakukan pemesanan, dan melihat status pesanan dengan lebih mudah.
                </p>

                <p class="mb-4">
                    Sistem ini juga membantu admin dalam mengelola data kategori, menu, pemesanan,
                    dan pembayaran secara terstruktur.
                </p>

                <a class="btn btn-primary py-3 px-5 mt-2" href="#menu">
                    Lihat Menu
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Paket Catering Start -->
<div class="container-xxl py-5" id="paket">

    <div class="container">

        <div class="text-center wow fadeInUp">

            <h5 class="section-title ff-secondary text-center text-primary fw-normal">
                Paket Catering
            </h5>

            <h1 class="mb-5">
                Paket Favorit Kami
            </h1>

        </div>

        <div class="row g-4">

            <?php foreach($paket as $p): ?>

            <div class="col-lg-4 col-md-6 wow fadeInUp">

                <div class="card border-0 shadow h-100">

                    <img
                        src="<?= base_url('uploads/paket/' . $p['gambar']) ?>"
                        class="card-img-top"
                        style="height:310px; object-fit:cover;">

                    <div class="card-body">

                        <h5 class="card-title">

                            <?= $p['nama_paket'] ?>

                        </h5>

                        <p class="card-text text-muted">

                            <?= $p['deskripsi'] ?>

                        </p>

                        <h5 class="text-primary">

                            Rp <?= number_format(
                                $p['harga_porsi'],
                                0,
                                ',',
                                '.'
                            ) ?>

                            / Porsi

                        </h5>

                    </div>

                </div>

            </div>

            <?php endforeach; ?>

        </div>

    </div>

</div>
<!-- Paket Catering End -->

<div class="container-xxl py-5" id="menu">
    <div class="container">
        <div class="text-center wow fadeInUp">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Menu Catering</h5>
            <h1 class="mb-5">Menu Tersedia</h1>
        </div>

     <div class="row g-4">

    <?php foreach($menu as $m): ?>

    <div class="col-lg-3 col-md-6 wow fadeInUp">

        <div class="card border-0 shadow h-100">

            <img
                src="<?= base_url('uploads/menu/' . $m['gambar']) ?>"
                class="card-img-top"
                style="height:220px; object-fit:cover;">

            <div class="card-body text-center">

                <h5>

                    <?= $m['nama_menu'] ?>

                </h5>

                <p class="text-muted small">

                    <?= $m['deskripsi'] ?>

                </p>

            </div>

        </div>

    </div>

    <?php endforeach; ?>

</div>
        </div>
    </div>
</div>



        </div>
        <div class="container-fluid bg-dark text-light footer pt-5  wow fadeIn">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-4 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Rany Catering</h4>
                        <p>
                            Sistem informasi pemesanan catering untuk memudahkan pelanggan melihat menu,
                            melakukan pemesanan, dan pembayaran secara online.
                        </p>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Menu</h4>
                        <a class="btn btn-link" href="#home">Home</a>
                        <a class="btn btn-link" href="#tentang">Tentang</a>
                        <a class="btn btn-link" href="#layanan">Layanan</a>
                        <a class="btn btn-link" href="#menu">Menu Catering</a>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Kontak</h4>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>08xxxxxxxxxx</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>ranycatering@email.com</p>
                    </div>
                </div>
            </div>



            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-12 text-center mb-3 mb-md-0">
                            &copy; <?= date('Y'); ?> Rany Catering
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top">
            <i class="bi bi-arrow-up"></i>
        </a>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="<?= base_url('assets/restoran/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/restoran/lib/wow/wow.min.js'); ?>"></script>
    <script src="<?= base_url('assets/restoran/lib/easing/easing.min.js'); ?>"></script>
    <script src="<?= base_url('assets/restoran/lib/waypoints/waypoints.min.js'); ?>"></script>
    <script src="<?= base_url('assets/restoran/lib/counterup/counterup.min.js'); ?>"></script>
    <script src="<?= base_url('assets/restoran/lib/owlcarousel/owl.carousel.min.js'); ?>"></script>
    <script src="<?= base_url('assets/restoran/lib/tempusdominus/js/moment.min.js'); ?>"></script>
    <script src="<?= base_url('assets/restoran/lib/tempusdominus/js/moment-timezone.min.js'); ?>"></script>
    <script src="<?= base_url('assets/restoran/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js'); ?>"></script>

    <script src="<?= base_url('assets/restoran/js/main.js'); ?>"></script>
</body>

</html>