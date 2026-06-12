<?= $this->extend('layout/pelanggan') ?>
<?= $this->section('content') ?>

<?php if(session()->getFlashdata('success')) : ?>

<script>

Swal.fire({

    icon: 'success',

    title: 'Berhasil',

    text: '<?= session()->getFlashdata('success') ?>',

    timer: 1500,

    showConfirmButton: false

});

</script>

<?php endif; ?>

<div class="container-fluid">

    <div class="card">

        <div class="card-header">
            <h4>Form Pemesanan</h4>
        </div>

        <div class="card-body">

            <h5><?= esc($paket['nama_paket']) ?></h5>

            <p>
                Harga :
                Rp <?= number_format($paket['harga_porsi'],0,',','.') ?>
                / porsi
            </p>

            

           <form action="<?= base_url('index.php/pelanggan/catering/tambahKeranjang') ?>" method="post">

    <input type="hidden"
           name="id_paket"
           value="<?= $paket['id_paket'] ?>">

    <div class="mb-3">
        <label>Jumlah Porsi</label>
        <input type="number"
               name="jumlah_porsi"
               class="form-control"
               min="1"
               required>
    </div>

    <div class="mb-3">
        <label>Tanggal Acara</label>
        <input type="date"
               name="tanggal_acara"
               class="form-control"
               required>
    </div>

    <div class="mb-3">
        <label>Alamat Acara</label>
        <textarea
            name="alamat_acara"
            class="form-control"
            required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">
        Lanjutkan
    </button>

</form>

        </div>

    </div>

</div>

<?= $this->endSection() ?>