<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'email', 'fullname', 'dob', 'phone']; // Added 'phone' field

    /**
     * Get user by username
     * 
     * @param string $username
     * @return array|null
     */
    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
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

    /**
     * Update user password by username
     * 
     * @param string $username
     * @param string $newPassword
     * @return bool
     */
    public function updatePassword($username, $newPassword)
    {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $data = ['password' => $hashedPassword];

        return $this->where('username', $username)->set($data)->update();
    }

    /**
     * Update user phone number by ID
     * 
     * @param int $id
     * @param string $phone
     * @return bool
     */
    public function updatePhoneNumber($id, $phone)
    {
        $data = ['phone' => $phone];

        if ($this->update($id, $data)) {
            log_message('info', 'User phone number updated successfully. ID: ' . $id);
            return true;
        } else {
            log_message('error', 'Failed to update user phone number. ID: ' . $id);
            return false;
        }
    }
}
