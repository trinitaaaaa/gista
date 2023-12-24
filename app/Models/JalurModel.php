<?php

namespace App\Models;

use CodeIgniter\Model;

class JalurModel extends Model
{
    protected $table = 'jalur';
    protected $primaryKey = 'id_jalur';
    protected $allowedFields = ['data_peta','nama_jalur', 'alamat', 'detail','id_gunung'];
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
    return $this->countAll();
    }
    public function deleteJalur($id)
    {
    return $this->where('id_jalur', $id)->delete();
    }
    public function getJalurName($name)
    {
        return $this->select('id_jalur')
                    ->where('nama_jalur', $name)
                    ->get()
                    ->getRow('id_jalur');
    }
}