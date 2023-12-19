<?php

namespace App\Models;

use CodeIgniter\Model;

class PosModel extends Model
{
    protected $table = 'pos';
    protected $primaryKey = 'id_pos';
    protected $allowedFields = ['pos', 'gambar_pos', 'kebutuhan_kalori', 'sumber_mata_air', 'flora_fauna', 'ketinggian_pos', 'waktu'];
    public function getAll()
    {
        return $this->findAll();
    }
    public function getPos($id)
    {
        return $this->where('id_pos', $id)->findAll();
    }
    public function countTotalPos()
    {
    return $this->countAll(); // Menghitung jumlah semua data di tabel pos
    }
}

