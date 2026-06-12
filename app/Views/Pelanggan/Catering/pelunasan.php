<?= $this->extend('layout/pelanggan') ?>

<?= $this->section('content') ?>

<div class="container py-4">


<div class="row justify-content-center">

    <div class="col-lg-8">

        <div class="card shadow border-0">

            <div class="card-header text-white"
                 style="background:#ff9800;">

                <h4 class="mb-0">
                    💳 Pelunasan Pembayaran
                </h4>

            </div>

            <div class="card-body p-4">

                <?php
                $sisa =
                    $pemesanan['sisa_pembayaran'];
                ?>

                <div class="alert alert-warning">

                    <h5 class="mb-3">
                        Informasi Pesanan
                    </h5>

                    <p>
                        <strong>No Invoice :</strong>
                        <?= $pemesanan['no_invoice'] ?>
                    </p>

                    <p>
                        <strong>Total Tagihan :</strong>
                        Rp <?= number_format(
                            $pemesanan['total_tagihan'],
                            0,
                            ',',
                            '.'
                        ) ?>
                    </p>

                    <p>
                        <strong>Sudah Dibayar :</strong>
                        Rp <?= number_format(
                            $pemesanan['total_terbayar'],
                            0,
                            ',',
                            '.'
                        ) ?>
                    </p>

                    <p class="mb-0">
                        <strong>Sisa Pelunasan :</strong>
                        Rp <?= number_format(
                            $sisa,
                            0,
                            ',',
                            '.'
                        ) ?>
                    </p>

                </div>

                <form
                    action="<?= base_url('index.php/pelanggan/catering/proses-pelunasan') ?>"
                    method="post">

                    <input
                        type="hidden"
                        name="id_pemesanan"
                        value="<?= $pemesanan['id_pemesanan'] ?>">

                    <input
                        type="hidden"
                        name="nominal"
                        value="<?= $sisa ?>">

                    <div class="mb-3">

    <label class="form-label fw-bold">
        Metode Pembayaran
    </label>

    <select
        name="metode_pembayaran"
        id="metode"
        class="form-select"
        required>

        <option value="">
            -- Pilih Metode Pembayaran --
        </option>

        <option value="Transfer">
            Transfer Bank
        </option>

        <option value="VA">
            Virtual Account
        </option>

        <option value="QRIS">
            QRIS
        </option>

        <option value="Cash">
            Cash
        </option>

    </select>

</div>

<div
    id="pilihBank"
    class="mb-3"
    style="display:none;">

    <label class="form-label fw-bold">
        Pilih Bank
    </label>

    <select
        id="bank"
        name="bank"
        class="form-select">

        <option value="">
            -- Pilih Bank --
        </option>

        <option value="BCA">
            BCA
        </option>

        <option value="Mandiri">
            Mandiri
        </option>

        <option value="BRI">
            BRI
        </option>

    </select>

</div>

<div id="infoPembayaran"></div>
                    <button
                        type="submit"
                        class="btn text-white"
                        style="background:#ff9800;">

                        Konfirmasi Pelunasan

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>


</div>


<script>

document.addEventListener('DOMContentLoaded', function(){

    const metode = document.getElementById('metode');
    const bank = document.getElementById('bank');
    const pilihBank = document.getElementById('pilihBank');
    const info = document.getElementById('infoPembayaran');

    metode.addEventListener('change', function(){

        pilihBank.style.display = 'none';
        info.innerHTML = '';

        if(this.value === 'Transfer' || this.value === 'VA')
        {
            pilihBank.style.display = 'block';

            if(bank){
                bank.selectedIndex = 0;
            }
        }

        if(this.value === 'QRIS')
        {
            info.innerHTML = `
                <div class="alert alert-success">

                    <h5>📱 Pembayaran QRIS</h5>

                    <img
                        src="<?= base_url('assets/img/qris.png') ?>"
                        width="250"
                        class="img-fluid rounded shadow">

                    <br><br>

                    Scan QR Code untuk melakukan pembayaran.

                </div>
            `;
        }

        if(this.value === 'Cash')
        {
            info.innerHTML = `
                <div class="alert alert-warning">

                    <h5>💵 Pembayaran Tunai</h5>

                    Pembayaran dilakukan langsung kepada admin Rany Catering.

                </div>
            `;
        }

    });

    bank.addEventListener('change', function(){

        const metodeDipilih = metode.value;

        if(this.value === '')
        {
            info.innerHTML = '';
            return;
        }

        if(metodeDipilih === 'Transfer')
        {
            let rekening = '';

            if(this.value === 'BCA')
            {
                rekening = '1234567890';
            }

            if(this.value === 'Mandiri')
            {
                rekening = '9876543210';
            }

            if(this.value === 'BRI')
            {
                rekening = '555666777';
            }

            info.innerHTML = `
                <div class="alert alert-info">

                    <h5>🏦 Transfer ${this.value}</h5>

                    No Rekening :
                    <strong>${rekening}</strong>

                    <br><br>

                    a.n Rany Catering

                </div>
            `;
        }

        if(metodeDipilih === 'VA')
        {
            let nomorVA = '';

            if(this.value === 'BCA')
            {
                nomorVA = '8808-<?= substr($pemesanan['no_invoice'],3) ?>';
            }

            if(this.value === 'Mandiri')
            {
                nomorVA = '7000-<?= substr($pemesanan['no_invoice'],3) ?>';
            }

            if(this.value === 'BRI')
            {
                nomorVA = '002-<?= substr($pemesanan['no_invoice'],3) ?>';
            }

            info.innerHTML = `
                <div class="alert alert-primary">

                    <h5>${this.value} Virtual Account</h5>

                    <strong>${nomorVA}</strong>

                </div>
            `;
        }

    });

});

</script>
<?= $this->endSection() ?>
