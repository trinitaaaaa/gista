<?php

namespace App\Models;

use CodeIgniter\Model;

class MakananModel extends Model
{
    protected $table = 'makanan';
    protected $primaryKey = 'id_makanan';
    protected $allowedFields = ['nama', 'kalori', 'gambar'];
    public function getMakanan()
    {
        return $this->findAll();
    }
    public function getAll()
    {
        return $this->findAll();
    }
    public function getUser($id)
    {
        return $this->where('id_user', $id)->findAll();
    }
    public function deleteMakanan($id)
    {
        return $this->where('id_makanan', $id)->delete();
    }
}
