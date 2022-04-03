<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="card">
    <div class="card-body">
        <h3>Pengertian CRUD</h3> adalah kepanjangan dari Create, Read, Update dan Delete.<br>
        Keempat istilah ini merupakan perintah atau query yang digunakan programmer<br>
        untuk melakukan aksi melalui database relasional.

        Umumnya fungsi tersebut diimplementasikan pada aplikasi pengelola basis data,<br>
        seperti Oracle, MySQL, SQL Server dan lain sebagainya.

        CRUD adalah metode yang dapat dihubungkan dengan tampilan antarmuka (interface)<br>
        sebagai fasilitator untuk melakukan perubahan data atau tampilan informasi<br>
        berbentuk formulir, tabel atau laporan. Bentuk ini nantinya akan ditampilkan dalam browser<br>
        atau aplikasi pada perangkat komputer pengguna.<br>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <br>
        <h3>Fungsi CRUD</h3>
        Seperti kepanjangannya, secara singkat fungsi CRUD adalah Create, Read, Update dan Delete.<br>
        Metode ini tidak terbatas pada pengembangan web saja, namun juga bisa diaplikasikan pada perangkat lunak (software) dengan basis mobile.
    </div>
</div>

    <?= $this->endSection(); ?>