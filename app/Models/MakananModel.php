<?php

namespace App\Models;

use CodeIgniter\Model;

class MakananModel extends Model
{
    protected $table = 'makanan'; // Nama tabel di database

    public function getMakanan()
    {
        // Mengambil data dari tabel users
        return $this->findAll(); // Mengambil semua data dari tabel
    }
    public function getAll()
    {
        return $this->findAll();
    }
    public function getUser($id)
    {
        return $this->where('id_user', $id)->findAll();
    }
}