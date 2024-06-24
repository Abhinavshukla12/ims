<?php

namespace App\Controllers\ImsControllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class AuthController extends Controller
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        helper(['form', 'url']);
    }

    public function register()
    {
        return view('ImsViews/auth/register');
    }

    public function processRegister()
    {
        $model = new UserModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'email' => $this->request->getPost('email'),
            'fullname' => $this->request->getPost('fullname'),
            'dob' => $this->request->getPost('dob'),
        ];

        if ($model->addUser($data)) {
            return redirect()->to(site_url('ims/login'))->with('success', 'User registered successfully!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to register user!');
        }
    }

    public function login()
    {
        return view('ImsViews/auth/login');
    }

    public function processLogin()
    {
        $model = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->getUserByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            $this->session->set('user', $user);
            return redirect()->to(site_url('ims/home'))->with('success', 'Login successful!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Invalid username or password!');
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(site_url('ims/login'))->with('success', 'Logged out successfully!');
    }

    public function profile()
    {
        $user = $this->session->get('user');
        if (!$user) {
            return redirect()->to(site_url('ims/login'))->with('error', 'Please login to view your profile.');
        }

        $model = new UserModel();
        $userData = $model->getUserByUsername($user['username']);
        $data['user'] = $userData;
        return view('ImsViews/dashboard/profile', $data);
    }

    public function changePassword()
{
    $user = $this->session->get('user');
    if (!$user) {
        log_message('error', 'User not found in session.');
        return redirect()->to(site_url('ims/login'))->with('error', 'Please login to change your password.');
    }

    if ($this->request->getMethod() == 'post') {
        log_message('info', 'POST request received for password change.');

        $rules = [
            'current_password' => 'required',
            'new_password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[new_password]'
        ];

        if (!$this->validate($rules)) {
            log_message('error', 'Validation failed: ' . implode(', ', $this->validator->getErrors()));
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $currentPassword = $this->request->getPost('current_password');
        $newPassword = $this->request->getPost('new_password');

        $model = new UserModel();
        $userData = $model->getUserByUsername($user['username']);

        if (!$userData) {
            log_message('error', 'User not found in database.');
            return redirect()->back()->with('error', 'User not found.');
        }

        log_message('info', 'User found: ' . $user['username']);

        if (!password_verify($currentPassword, $userData['password'])) {
            log_message('error', 'Current password is incorrect.');
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }

        log_message('info', 'Current password verified successfully.');

        $data = [
            'password' => password_hash($newPassword, PASSWORD_DEFAULT)
        ];

        if ($model->updateUser($user['id'], $data)) {
            log_message('info', 'Password updated successfully in the database.');

            // Update the session with the new password hash
            $user['password'] = $data['password'];
            $this->session->set('user', $user);

            return redirect()->to(site_url('ims/profile'))->with('success', 'Password changed successfully.');
        } else {
            log_message('error', 'Failed to update the password in the database.');
            return redirect()->back()->with('error', 'Failed to change password.');
        }
    } else {
        log_message('info', 'GET request received for password change.');
        return view('ImsViews/dashboard/change_password');
    }
}
}
