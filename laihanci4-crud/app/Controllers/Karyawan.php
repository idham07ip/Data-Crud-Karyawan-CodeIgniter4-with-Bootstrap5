<?php

namespace App\Controllers;

use App\Models\KaryawanModel;

class Karyawan extends BaseController
{

    public function __construct()
    {
        $this->karyawan = new KaryawanModel();
    }

    public function index()
    {
        $query = $this->karyawan->findAll();

        $data = [
            'title' => 'Data Karyawan',
            'tampildata' => $query
        ];

        return view('karyawan/index', $data);
    }

    public function tambahdata()
    {
        $data = [
            'title' => 'Tambah Data Karyawan',
            'validation' => \Config\Services::validation()
        ];

        return view('karyawan/tambahdata', $data);
    }

    public function save()
    {
        $validation = \Config\Services::validation();
        $validate = $this->validate([
            'nik' => [
                'rules' => 'required|numeric|min_length[3]|max_length[16]',
                'errors' => [
                    'required' => 'NIK tidak boleh kosong.',
                    'numeric' => 'NIK hanya berisi angka saja.',
                    'max_length' => 'NIK harus 16 angka.',
                    'min_length' => 'NIK tidak boleh terlalu singkat.'
                ]
            ],

            'nama' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong.',
                    'min_length' => 'Nama tidak boleh terlalu singkat.'
                ]
            ],

            'gender' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis kelamin harus dipilih.'
                ]
            ],

            'tempat_lahir' => [
                        'rules' => 'required|min_length[3]',
                        'errors' => [
                            'required' => 'Tempat lahir tidak boleh kosong.',
                            'min_length' => 'Tempat lahir tidak boleh terlalu singkat.'
                ]
            ],

            'tanggal_lahir' => [
                            'rules' => 'required|valid_date[Y-m-d]',
                            'errors' => [
                                'required' => 'Tanggal lahir tidak boleh kosong.',
                                'valid_date' => 'Format pada tanggal lahir tidak sesuai. Contoh: 1945-08-17'
                ]
            ],

            'alamat' => [
                        'rules' => 'required|min_length[3]',
                        'errors' => [
                            'required' => 'Alamat tidak boleh kosong.',
                            'min_length' => 'Alamat tidak boleh terlalu singkat.'
                ]
            ],

            'foto' => [
                        'rules' => 'uploaded[foto]|max_size[foto, 1024]|mime_in[foto,image/jpg,image/jpeg,image/png]|is_image[foto]',
                        'errors' => [
                            'uploaded' => 'Foto tidak boleh kosong.',
                            'max_size' => 'Ukuran gambar terlalu besa, Max. adalah 1MB',
                            'mime_in' => 'Format gambar tidak sesuai, format yang didukung adalah .jpg , .jpeg dan .png',
                            'is_image' => 'Format gambar tidak sesuai, format yang didukung adalah .jpg , .jpeg dan .png'
                ]
            ],
        ]);

        if (!$validate) {
            //return redirect()->to('/karyawan/tambahdata')->withInput()->with('validation', $validation);
            return redirect()->to('/karyawan/tambahdata')->withInput();
        } else {
            $getFile = $this->request->getFile('foto');
            //$nameFile = $getFile->getRandomName();
            $nameFile = $getFile->getName();
            $getFile->move('assets/img', $nameFile);

            $data = [
                'nik' => $this->request->getVar('nik'),
                'nama' => $this->request->getVar('nama'),
                'gender' => $this->request->getVar('gender'),
                'tempat_lahir' => $this->request->getVar('tempat_lahir'),
                'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
                'alamat' => $this->request->getVar('alamat'),
                'foto' => $nameFile,
            ];

            $insert = $this->karyawan->save($data);

            if ($insert) {
                session()->setFlashData('pesan', '<div class="alert alert-success" role="alert">Data Berhasil di Simpan.</div>');
                return redirect()->to('/karyawan');
            } else {
                session()->setFlashData('pesan', '<div class="alert alert-danger" role="alert">Data Gagal di Simpan.</div>');
                return redirect()->to('/karyawan/tambahdata');
            }
        }
    }

        

    public function detail($id)
    {
        $getdata = $this->karyawan->find($id);
        $data = [
            'title' => 'Detail Rincian Karyawan',
            'tampildata' => $getdata
        ];

        return view('karyawan/detail', $data);
    }

    public function formeditdata($id)
    {
        $getdata = $this->karyawan->find($id);
        $data = [
            'title' => 'Edit Data Karyawan',
            'tampildata' => $getdata,
            'validation' => \Config\Services::validation()
        ];

        return view('karyawan/editdata', $data);
    }

    public function edit($id)
    {
        $validation = \Config\Services::validation();
        $validate = $this->validate([
            'nik' => [
                'rules' => 'required|numeric|min_length[3]|max_length[16]',
                'errors' => [
                    'required' => 'NIK tidak boleh kosong.',
                    'numeric' => 'NIK hanya berisi angka saja.',
                    'max_length' => 'NIK harus 16 angka.',
                    'min_length' => 'NIK tidak boleh terlalu singkat.'
                ]
            ],

            'nama' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong.',
                    'min_length' => 'Nama tidak boleh terlalu singkat.'
                ]
            ],

            'gender' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis kelamin harus dipilih.'
                ]
            ],

            'tempat_lahir' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Tempat lahir tidak boleh kosong.',
                    'min_length' => 'Tempat lahir tidak boleh terlalu singkat.'
                ]
            ],

            'tanggal_lahir' => [
                'rules' => 'required|valid_date[Y-m-d]',
                'errors' => [
                    'required' => 'Tanggal lahir tidak boleh kosong.',
                    'valid_date' => 'Format pada tanggal lahir tidak sesuai. Contoh: 1945-08-17'
                ]
            ],

            'alamat' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Alamat tidak boleh kosong.',
                    'min_length' => 'Alamat tidak boleh terlalu singkat.'
                ]
            ],

            'foto' => [
                'rules' => 'uploaded[foto]|max_size[foto, 1024]|mime_in[foto,image/jpg,image/jpeg,image/png]|is_image[foto]',
                'errors' => [
                    'uploaded' => 'Foto tidak boleh kosong.',
                    'max_size' => 'Ukuran gambar terlalu besa, Max. adalah 1MB',
                    'mime_in' => 'Format gambar tidak sesuai, format yang didukung adalah .jpg , .jpeg dan .png',
                    'is_image' => 'Format gambar tidak sesuai, format yang didukung adalah .jpg , .jpeg dan .png'
                ]
            ],
        ]);

        if (!$validate) {
            return redirect()->to('/karyawan/formeditdata' . $id)->withInput()->with('validation', $validation);
        } else {
            $getFile = $this->request->getFile('foto');
            //$nameFile = $getFile->getRandomName();
            $nameFile = $getFile->getName();
            $getFile->move('assets/img', $nameFile);

            $data = [
                'nik' => $this->request->getVar('nik'),
                'nama' => $this->request->getVar('nama'),
                'gender' => $this->request->getVar('gender'),
                'tempat_lahir' => $this->request->getVar('tempat_lahir'),
                'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
                'alamat' => $this->request->getVar('alamat'),
                'foto' => $nameFile,
            ];

            $update = $this->karyawan->update($id, $data);

            if ($update) {
                session()->setFlashData('pesan', '<div class="alert alert-success" role="alert">Data Berhasil diubah.</div>');
                return redirect()->to('/karyawan');
            } else {
                session()->setFlashData('pesan', '<div class="alert alert-danger" role="alert">Data Gagal diubah.</div>');
                return redirect()->to('/karyawan/formeditdata');
            }
        }
    }

    public function delete($id)
    {
        $delete = $this->karyawan->delete($id);

        if ($delete) {
            session()->setFlashData('pesan', '<div class="alert alert-success" role="alert">Data Berhasil dihapus.</div>');
            return redirect()->to('/karyawan');
        } else {
            session()->setFlashData('pesan', '<div class="alert alert-danger" role="alert">Data Gagal dihapus.</div>');
            return redirect()->to('/karyawan');
        } 
    } 
}
