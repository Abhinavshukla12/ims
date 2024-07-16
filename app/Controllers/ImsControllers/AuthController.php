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
        return view('ImsViews/profile/profile', $data);
    }

    public function changeUsername()
    {
        $user = $this->session->get('user');
        if (!$user) {
            return redirect()->to(site_url('ims/login'))->with('error', 'Please login to change your username.');
        }

        $data['user'] = $user; // Pass the $user data to the view

        return view('ImsViews/profile/change_username', $data);
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
            return view('ImsViews/profile/change_password');
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

        return view('ImsViews/profile/change_number', $data); // Create a view file for change_number form
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

    public function deleteAccount()
    {
        // Check if it's a POST request
        if ($this->request->getMethod() === 'post') {
            // Debug log
            log_message('debug', 'Delete account method reached.');

            // Validate CSRF protection
            if (! $this->validate(['csrf_token' => 'valid_csrf'])) {
                log_message('error', 'CSRF Token validation failed.');
                return redirect()->back()->withInput()->with('error', 'CSRF Token validation failed.');
            }

            // Ensure user is logged in
            if (!$this->isLoggedIn()) {
                log_message('error', 'User is not logged in.');
                return redirect()->to(base_url('ims/login')); // Redirect to login if not logged in
            }

            // Get user ID from session or any other secure method
            $userId = session()->get('user_id');
            log_message('debug', 'User ID retrieved from session: ' . $userId);

            // Load the UserModel
            $userModel = new UserModel();

            // Attempt to delete user
            try {
                // Delete user data
                if (!$userModel->deleteUserById($userId)) {
                    log_message('error', 'Failed to delete user account.');
                    return redirect()->to(base_url('ims/profile'))->with('error', 'Failed to delete account. Please try again.');
                }
                
                // Clear session data
                session()->destroy();
                log_message('info', 'User session destroyed.');

                // Redirect to authentication page after deletion
                return redirect()->to(base_url('ims/login'))->with('success', 'Your account has been deleted successfully.');
            } catch (\Exception $e) {
                // Handle deletion error
                log_message('error', 'Exception while deleting user account: ' . $e->getMessage());
                return redirect()->to(base_url('ims/profile'))->with('error', 'Failed to delete account. Please try again.');
            }
        } else {
            // Redirect to profile page or handle invalid request method
            log_message('error', 'Invalid request method.');
            return redirect()->to(base_url('ims/profile'))->with('error', 'Invalid request method.');
        }
    }

    public function switchAccount()
    {
        // Destroy current session
        $this->session->destroy();
        // Redirect to login page
        return redirect()->to(site_url('ims/login'))->with('success', 'You have switched accounts. Please log in again.');
    }

    // Helper function to check if user is logged in
    private function isLoggedIn()
    {
        return session()->has('user_id'); // Adjust based on your session implementation
    }
}
