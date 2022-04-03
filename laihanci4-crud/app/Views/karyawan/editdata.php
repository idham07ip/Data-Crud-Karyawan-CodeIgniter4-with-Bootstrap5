<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <h1 class="mt-3"><?= $title ?></h1>

        <p><?= session()->getFlashData('pesan') ?></p>
        <div class="col my-4">
            <form action="/karyawan/edit/<?= $tampildata['id']; ?>" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control  <?= ($validation->getError('nik')) ? "is-invalid" : "" ?>" id="nik" name="nik" value="<?= (old('nik')) ? old('nik') : $tampildata['nik'] ?>">
                    <div class="invalid-feedback"><?= $validation->getError('nik'); ?></div>
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control <?= ($validation->getError('nama')) ? "is-invalid" : "" ?>" id="nama" name="nama" value="<?= (old('nama')) ? old('nama') : $tampildata['nama'] ?>">
                    <div class="invalid-feedback"><?= $validation->getError('nama'); ?></div>
                </div>

                <div class="mb-3">
                    <label for="gender" class="form-label">Jenis Kelamin</label>
                    <select type="text" class="form-control <?= ($validation->getError('gender')) ? "is-invalid" : "" ?>" id="gender" name="gender">
                        <option selected disabled></option>
                            <option value="Laki-laki" <?= ($tampildata['gender'] == "Laki-laki") ? "selected" : "" ?>>Laki-laki</option>
                            <option value="Perempuan" <?= ($tampildata['gender'] == "Perempuan") ? "selected" : "" ?>>Perempuan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control <?= ($validation->getError('tempat_lahir')) ? "is-invalid" : "" ?>" id="tempat_lahir" name="tempat_lahir" value="<?= (old('tempat_lahir')) ? old('tempat_lahir') : $tampildata['tempat_lahir'] ?>">
                    <div class="invalid-feedback"><?= $validation->getError('tempat_lahir'); ?></div>
                </div>

                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="text" class="form-control <?= ($validation->getError('tanggal_lahir')) ? "is-invalid" : "" ?>" id="tanggal_lahir" name="tanggal_lahir" value="<?= (old('tanggal_lahir')) ? old('tanggal_lahir') : $tampildata['tanggal_lahir'] ?>">
                    <div class="invalid-feedback"><?= $validation->getError('tanggal_lahir'); ?></div>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control <?= ($validation->getError('alamat')) ? "is-invalid" : "" ?>" id="alamat" name="alamat" value="<?= (old('alamat')) ? old('alamat') : $tampildata['alamat'] ?>">
                    <div class="invalid-feedback"><?= $validation->getError('alamat'); ?></div>
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" class="form-control <?= ($validation->getError('foto')) ? "is-invalid" : "" ?>" id="foto" name="foto" value="<?= (old('foto')) ? old('foto') : $tampildata['foto'] ?>">
                    <div class="invalid-feedback"><?= $validation->getError('foto'); ?></div>
                </div>

                <button type="submit" class="btn btn-success">Edit</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>