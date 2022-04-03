<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <h1 class="mt-3">Tambah Karyawan</h1>

        <p><?= session()->getFlashData('pesan') ?></p>

        <div class="col my-4">
            <form action="/karyawan/save/" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <b><label for="nik" class="form-label">NIK</label></b>
                    <input type="text" class="form-control <?= ($validation->getError('nik')) ? "is-invalid" : "" ?>" id="nik" name="nik" value="<?= old('nik'); ?>">
                    <div class="invalid-feedback"><?= $validation->getError('nik'); ?></div>
                </div>

                <div class="mb-3">
                    <b><label for="nama" class="form-label">Nama</label></b>
                    <input type="text" class="form-control <?= ($validation->getError('nama')) ? "is-invalid" : "" ?>" id="nama" name="nama" value="<?= old('nama'); ?>">
                    <div class=" invalid-feedback"><?= $validation->getError('nama'); ?>
                    </div>
                </div>

                <div class="mb-3">
                    <b><label for="gender" class="form-label">Jenis Kelamin</label></b>
                    <select type="text" class="form-control <?= ($validation->getError('gender')) ? "is-invalid" : "" ?>" id="gender" name="gender">
                        <option selected disabled></option>
                        <b><option value="Laki-laki" <?= (old('gender') == "Laki-laki") ? "selected" : "" ?>>Laki-laki</option></b>
                        <b><option value="Perempuan" <?= (old('gender') == "Perempuan") ? "selected" : "" ?>>Perempuan</option></b>
                    </select>
                    <div class=" invalid-feedback"><?= $validation->getError('gender'); ?></div>
                </div>

                <div class="mb-3">
                    <b><label for="tempat_lahir" class="form-label">Tempat Lahir</label></b>
                    <input type="text" class="form-control  <?= ($validation->getError('tempat_lahir')) ? "is-invalid" : "" ?>" id=" tempat_lahir" name="tempat_lahir" value="<?= old('tempat_lahir'); ?>">
                    <div class="invalid-feedback"><?= $validation->getError('tempat_lahir'); ?></div>
                </div>

                <div class="mb-3">
                    <b><label for="tanggal_lahir" class="form-label">Tanggal Lahir</label></b>
                    <input type="date" class="form-control  <?= ($validation->getError('tanggal_lahir')) ? "is-invalid" : "" ?>" id=" tanggal_lahir" name="tanggal_lahir" value="<?= old('tanggal_lahir'); ?>">
                    <div class="invalid-feedback"><?= $validation->getError('tanggal_lahir'); ?></div>
                </div>

                <div class="mb-3">
                    <b><label for="alamat" class="form-label">Alamat</label></b>
                    <input type="text" class="form-control <?= ($validation->getError('alamat')) ? "is-invalid" : "" ?>" id="alamat" name="alamat" value="<?= old('alamat'); ?>">
                    <div class="invalid-feedback"><?= $validation->getError('alamat'); ?></div>
                </div>

                <div class="mb-3">
                    <b><label for="foto" class="form-label">Foto</label></b>
                    <input type="file" class="form-control <?= ($validation->getError('foto')) ? "is-invalid" : "" ?>" id="foto" name="foto" value="<?= old('foto'); ?>">
                    <div class="invalid-feedback"><?= $validation->getError('foto'); ?></div>
                </div>

                <button type="submit" class="btn btn-success">Tambah</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>