<?= $this->extend('layout/pelanggan') ?>

<?= $this->section('content') ?>

<div class="container py-4">

```
<div class="row justify-content-center">

    <div class="col-lg-8">

        <div class="card shadow border-0">

            <div class="card-header text-white"
                style="background:#ff9800;">

                <h4 class="mb-0">
                    💳 Pembayaran DP
                </h4>

            </div>

            <div class="card-body p-4">

                <?php $dp = $pemesanan['total_tagihan'] * 0.5; ?>

                <div class="alert alert-warning">

                    <h5 class="mb-3">
                        Informasi Pesanan
                    </h5>

                    <p class="mb-2">
                        <strong>No Invoice :</strong>
                        <?= $pemesanan['no_invoice'] ?>
                    </p>

                    <p class="mb-2">
                        <strong>Total Tagihan :</strong>
                        Rp <?= number_format($pemesanan['total_tagihan'],0,',','.') ?>
                    </p>

                    <p class="mb-0">
                        <strong>Jumlah DP (50%) :</strong>
                        Rp <?= number_format($dp,0,',','.') ?>
                    </p>

                </div>

                <form
                    action="<?= base_url('index.php/pelanggan/catering/proses-dp') ?>"
                    method="post">

                    <input
                        type="hidden"
                        name="id_pemesanan"
                        value="<?= $pemesanan['id_pemesanan'] ?>">

                    <input
                        type="hidden"
                        name="nominal"
                        value="<?= $dp ?>">

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
                        style="display:none;">

                        <label
                            class="form-label fw-bold">

                            Pilih Bank

                        </label>

                        <select
                            class="form-select"
                            id="bank">

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

                    <div
                        id="infoPembayaran"
                        class="mt-3">
                    </div>

                    <div class="mt-4 d-flex gap-2">

                        <a
                            href="<?= base_url('index.php/pelanggan/catering/pesanan-saya') ?>"
                            class="btn btn-secondary">

                            Kembali

                        </a>

                        <button
                            type="submit"
                            class="btn text-white"
                            style="background:#ff9800;">

                            Konfirmasi Pembayaran

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>
```

</div>

<script>

document.addEventListener('DOMContentLoaded', function(){

    const metode = document.getElementById('metode');
    const bank = document.getElementById('bank');
    const info = document.getElementById('infoPembayaran');
    const pilihBank = document.getElementById('pilihBank');

    metode.addEventListener('change', function(){

        bank.selectedIndex = 0;
        info.innerHTML = '';

        if(this.value === 'Transfer')
        {
            pilihBank.style.display = 'block';

            document.querySelector('#pilihBank label')
                .innerHTML = 'Pilih Bank Transfer';
        }

        else if(this.value === 'VA')
        {
            pilihBank.style.display = 'block';

            document.querySelector('#pilihBank label')
                .innerHTML = 'Pilih Bank Virtual Account';
        }

        else if(this.value === 'QRIS')
        {
            pilihBank.style.display = 'none';

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

        else if(this.value === 'Cash')
        {
            pilihBank.style.display = 'none';

            info.innerHTML = `
                <div class="alert alert-warning">

                    <h5>💵 Pembayaran Tunai</h5>

                    Pembayaran dilakukan langsung
                    kepada admin Rany Catering.

                </div>
            `;
        }

        else
        {
            pilihBank.style.display = 'none';
        }

    });

    bank.addEventListener('change', function(){

        const metodeDipilih = metode.value;

        if(metodeDipilih === 'Transfer')
        {
            if(this.value === 'BCA')
            {
                info.innerHTML = `
                    <div class="alert alert-info">

                        <h5>🏦 Transfer BCA</h5>

                        No Rekening:
                        <strong>1234567890</strong>

                        <br><br>

                        a.n Rany Catering

                    </div>
                `;
            }

            else if(this.value === 'Mandiri')
            {
                info.innerHTML = `
                    <div class="alert alert-info">

                        <h5>🏦 Transfer Mandiri</h5>

                        No Rekening:
                        <strong>9876543210</strong>

                        <br><br>

                        a.n Rany Catering

                    </div>
                `;
            }

            else if(this.value === 'BRI')
            {
                info.innerHTML = `
                    <div class="alert alert-info">

                        <h5>🏦 Transfer BRI</h5>

                        No Rekening:
                        <strong>555666777</strong>

                        <br><br>

                        a.n Rany Catering

                    </div>
                `;
            }
        }

        else if(metodeDipilih === 'VA')
        {
            if(this.value === 'BCA')
            {
                info.innerHTML = `
                    <div class="alert alert-primary">

                        <h5>BCA Virtual Account</h5>

                        <strong>
                        8808-<?= substr($pemesanan['no_invoice'],3) ?>
                        </strong>

                    </div>
                `;
            }

            else if(this.value === 'Mandiri')
            {
                info.innerHTML = `
                    <div class="alert alert-primary">

                        <h5>Mandiri Virtual Account</h5>

                        <strong>
                        7000-<?= substr($pemesanan['no_invoice'],3) ?>
                        </strong>

                    </div>
                `;
            }

            else if(this.value === 'BRI')
            {
                info.innerHTML = `
                    <div class="alert alert-primary">

                        <h5>BRI Virtual Account</h5>

                        <strong>
                        002-<?= substr($pemesanan['no_invoice'],3) ?>
                        </strong>

                    </div>
                `;
            }
        }

    });

});

</script>

<?= $this->endSection() ?>
