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
        return view('ImsViews/auth/auth_index');
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
        return view('ImsViews/auth/auth_index');
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

    public function changeUsername()
    {
        $user = $this->session->get('user');
        if (!$user) {
            return redirect()->to(site_url('ims/login'))->with('error', 'Please login to change your username.');
        }

        $data['user'] = $user; // Pass the $user data to the view

        return view('ImsViews/auth/change_username', $data);
    }

    public function processChangeUsername()
    {
        $user = $this->session->get('user');
        if (!$user) {
            return redirect()->to(site_url('ims/login'))->with('error', 'Please login to change your username.');
        }

        $newUsername = $this->request->getPost('new_username');
        $model = new UserModel();

        if ($model->updateUser($user['id'], ['username' => $newUsername])) {
            // Update session data
            $user['username'] = $newUsername;
            $this->session->set('user', $user);
            return redirect()->to(site_url('ims/profile'))->with('success', 'Username changed successfully!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to change username!');
        }
    }
}
