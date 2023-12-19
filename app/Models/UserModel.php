<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['nama','username', 'email', 'password', 'role'];

    public function get_data($username, $password)
	{
      return $this->db->table('user')
      ->where(array('username' => $username, 'password' => $password))
      ->get()->getRowArray();
	}
    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
    }
    public function getAll()
    {
        return $this->findAll();
    }
    public function getUser($id)
    {
        return $this->where('id_user', $id)->findAll();
    }
    public function countTotalUser()
    {
    return $this->countAll(); // Menghitung jumlah semua data di tabel user
    }
}