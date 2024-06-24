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
            return redirect()->to(site_url('ims/login'))->with('error', 'Please login to change your password.');
        }

        if ($this->request->getMethod() == 'post') {
            $currentPassword = $this->request->getPost('current_password');
            $newPassword = $this->request->getPost('new_password');
            $confirmPassword = $this->request->getPost('confirm_password');

            if ($newPassword !== $confirmPassword) {
                return redirect()->back()->with('error', 'New passwords do not match.');
            }

            $model = new UserModel();
            $userData = $model->getUserByUsername($user['username']);

            if (!password_verify($currentPassword, $userData['password'])) {
                return redirect()->back()->with('error', 'Current password is incorrect.');
            }

            $data = [
                'password' => password_hash($newPassword, PASSWORD_DEFAULT)
            ];

            if ($model->update($user['id'], $data)) {
                return redirect()->to(site_url('ims/profile'))->with('success', 'Password changed successfully.');
            } else {
                return redirect()->back()->with('error', 'Failed to change password.');
            }
        } else {
            return view('ImsViews/dashboard/change_password');
        }
    }
}
