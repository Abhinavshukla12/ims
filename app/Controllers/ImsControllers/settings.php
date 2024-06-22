<?php

namespace App\Controllers\ImsControllers;

use App\Controllers\BaseController;

class settings extends BaseController
{
    public function index()
    {
        // Check if user is logged in
        if (!session()->has('user')) {
            return redirect()->to(site_url('ims/login'))->with('error', 'Please login to access setting page.');
        }

        return view('ImsViews/settings/index');
    }
}