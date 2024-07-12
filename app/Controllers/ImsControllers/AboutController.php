<?php

namespace App\Controllers\ImsControllers;

use App\Controllers\BaseController;
use App\Models\AboutContentModel;

class AboutController extends BaseController
{
    public function index()
    {
        // Check if user is logged in
        if (!session()->has('user')) {
            return redirect()->to(site_url('ims/login'))->with('error', 'Please login to access the about.');
        }

        // Load the model and fetch the content
        $model = new AboutContentModel();
        $aboutContent = $model->first(); // Assuming you only have one record for the about page content

        // Pass the content to the view
        return view('ImsViews/about/index', ['aboutContent' => $aboutContent]);
    }
}