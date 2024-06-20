<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'email'];

    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
    }

    public function addUser($data)
    {
        return $this->insert($data);
    }
}
