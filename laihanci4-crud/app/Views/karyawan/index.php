<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <p>
        <h1>Data Karyawan</h1>
        </p>

        <div class="col">
            <a class="btn btn-success" href="/karyawan/tambahdata/" role="button">Tambah Data</a>
            <p><?= session()->getFlashData('pesan'); ?></p>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Tempat Lahir</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Foto</th>
                        <th scope="col" class="text-center">Pilihan</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($tampildata as $row) : ?>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td><?= $row['nik']; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['gender']; ?></td>
                            <td><?= $row['tempat_lahir']; ?></td>
                            <td><?= $row['tanggal_lahir']; ?></td>
                            <td><?= $row['alamat']; ?></td>
                            <td><img src="<?= base_url() ?>/assets/img/<?= $row['foto']; ?>" class="img-thumbnail" width="120"></td>
                            <td class="text-center">
                                <a class="btn btn-info" href="/karyawan/detail/<?= $row['id'] ?>" >Detail</a>
                                <a class="btn btn-warning" href="/karyawan/formeditdata/<?= $row['id'] ?>" >Edit Data</a>
                                <a class="btn btn-danger" href="/karyawan/delete/<?= $row['id'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>