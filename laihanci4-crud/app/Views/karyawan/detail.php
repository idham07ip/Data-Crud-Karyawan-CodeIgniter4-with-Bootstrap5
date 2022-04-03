<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <h1 class="mt-3">Detail Karyawan</h1>
    <div class="row">
        <div class="card my-4" style="width: 500px;">
            <img src="<?= base_url() ?>/assets/img/<?= $tampildata['foto']; ?>" class="card-img-top" alt="<?= $tampildata['foto']; ?>">
            <div class="card-body" align="center">
                <b><h3 class="card-title"><?= $tampildata['nama']; ?></h3></b>
                <p class="card-text">
                    Jenis Kelamin : <?= $tampildata['gender']; ?> <br>
                    Alamat : <?= $tampildata['alamat']; ?> <br>
                    Tempat/Tanggal Lahir : <?= $tampildata['tempat_lahir'] . ", " . $tampildata['tanggal_lahir']; ?>

                </p>
                <a href="/karyawan" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>