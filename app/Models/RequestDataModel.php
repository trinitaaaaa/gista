<?php

namespace App\Models;

use CodeIgniter\Model;

class RequestDataModel extends Model
{
    protected $table = 'request_data';
    protected $primaryKey = 'id_request';
    protected $allowedFields = ['id_user','gambar_gunung', 'nama_gunung', 'ketinggian_mdpl', 'ketinggian_ft',	'pulau', 'data_peta', 'nama_jalur', 'alamat', 'detail', 'pos', 'gambar_pos', 'kebutuhan_kalori', 'sumber_mata_air', 'flora_fauna', 'ketinggian_pos', 'waktu', 'status_gunung', 'status_jalur','status_pos', 'alasan_gunung', 'alasan_jalur','alasan_pos']; 

    public function getAll()
    {
        // Mengambil data dari tabel users
        return $this->findAll(); // Mengambil semua data dari tabel
    }
    public function getByUser($id)
    {
        // Mengambil data dari tabel users
        return $this->where('id_user', $id)->findAll();
    }
    public function getRequest($id)
    {
        return $this->where('id_request', $id)->findAll();
    }
}