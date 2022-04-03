<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table      = 'karyawan';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id', 'nik', 'nama', 'gender', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'foto'];

    protected $useTimestamps = false;
}
