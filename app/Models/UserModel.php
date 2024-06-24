<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'email', 'fullname', 'dob'];

    /**
     * Get user by username
     * 
     * @param string $username
     * @return array|null
     */
    public function getUserByUsername($username)
    {
        $user = $this->where('username', $username)->first();
        if ($user) {
            log_message('info', 'User found in getUserByUsername: ' . $username);
        } else {
            log_message('error', 'User not found in getUserByUsername: ' . $username);
        }
        return $user;
    }

    /**
     * Add a new user to the database
     * 
     * @param array $data
     * @return bool
     */
    public function addUser($data)
    {
        if ($this->insert($data)) {
            log_message('info', 'User added successfully.');
            return true;
        } else {
            log_message('error', 'Failed to add user.');
            return false;
        }
    }

    /**
     * Update user data by ID
     * 
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function updateUser($id, $data)
    {
        if ($this->update($id, $data)) {
            log_message('info', 'User updated successfully. ID: ' . $id);
            return true;
        } else {
            log_message('error', 'Failed to update user. ID: ' . $id);
            return false;
        }
    }
}
