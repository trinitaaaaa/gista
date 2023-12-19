<?php

namespace App\Models;

use CodeIgniter\Model;

class JalurModel extends Model
{
    protected $table = 'jalur';
    protected $primaryKey = 'id_jalur';
    protected $allowedFields = ['data_peta','nama_jalur', 'alamat', 'detail'];
    public function getAll()
    {
        return $this->findAll();
    }
    public function getJalur($id)
    {
        return $this->where('id_jalur', $id)->findAll();
    }
    public function countTotalJalur()
    {
    return $this->countAll(); // Menghitung jumlah semua data di tabel jalur
    }
}