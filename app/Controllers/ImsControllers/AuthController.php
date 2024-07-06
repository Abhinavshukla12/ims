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

    public function changePassword()
    {
        $user = $this->session->get('user');
        if (!$user) {
            return redirect()->to(site_url('ims/login'))->with('error', 'Please login to change your password.');
        }

        if ($this->request->getMethod() === 'post') {
            // Handle form submission

            // Validate form data
            $validationRules = [
                'current_password' => 'required',
                'new_password'     => 'required|min_length[6]',
            ];

            if (!$this->validate($validationRules)) {
                return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
            }

            $model = new UserModel();
            $userData = $model->getUserByUsername($user['username']);

            // Verify current password
            $currentPassword = $this->request->getPost('current_password');
            if (!password_verify($currentPassword, $userData['password'])) {
                return redirect()->back()->with('error', 'Current password is incorrect.');
            }

            // Update password
            $newPassword = $this->request->getPost('new_password');
            if ($model->updatePassword($user['username'], $newPassword)) {
                return redirect()->to(site_url('ims/profile'))->with('success', 'Password changed successfully.');
            } else {
                return redirect()->back()->with('error', 'Failed to change password. Please try again.');
            }
        } else {
            // Handle GET request to show change password form
            return view('ImsViews/auth/change_password');
        }
    }

    public function change_number()
    {
        // Fetch user data based on session or ID
        $userId = 1; // Replace with actual user ID from session or other logic
        $userModel = new UserModel();
        $user = $userModel->find($userId);

        // Pass user data to view, including current phone number
        $data = [
            'user' => $user,
            'current_phone' => $user['phone'] // Assuming 'phone' is a field in your users table
        ];

        return view('ImsViews/auth/change_number', $data); // Create a view file for change_number form
    }

    /**
     * Process form submission to change user phone number.
     */
    public function updatePhoneNumber()
    {
        $userId = 1; // Replace with actual user ID from session or other logic
        $phone = $this->request->getPost('phone');

        $userModel = new UserModel();
        $success = $userModel->updatePhoneNumber($userId, $phone);

        if ($success) {
            // Redirect or show success message
            return redirect()->to(base_url('ims/profile')); // Replace with your profile page URL
        } else {
            // Handle error
            return "Failed to update phone number.";
        }
    }
}
