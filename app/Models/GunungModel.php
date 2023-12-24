<?php

namespace App\Models;

use CodeIgniter\Model;

class GunungModel extends Model
{
    protected $table = 'gunung'; // Nama tabel di database
    protected $primaryKey = 'id_gunung';
    protected $allowedFields = ['gambar_gunung','nama_gunung', 'ketinggian_mdpl', 'ketinggian_ft', 'pulau']; // Daftar bidang yang diizinkan
    public function getGunung()
    {
        // Mengambil data dari tabel users
        return $this->findAll(); // Mengambil semua data dari tabel
    }
    public function getGunungID($id)
    {
        return $this->select('nama_gunung')
                    ->where('id_gunung', $id)
                    ->get()
                    ->getRow('nama_gunung');
    }
    public function getGunungName($name)
    {
        return $this->select('id_gunung')
                    ->where('nama_gunung', $name)
                    ->get()
                    ->getRow('id_gunung');
    }
    public function countTotalGunung()
    {
    return $this->countAll(); // Menghitung jumlah semua data di tabel gunung
    }

    public function deleteGunung($id)
    {
    return $this->where('id_gunung', $id)->delete(); // Menghapus data pengguna berdasarkan ID
    }
}