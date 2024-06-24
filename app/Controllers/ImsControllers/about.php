<?php

namespace App\Controllers\ImsControllers;

use App\Controllers\BaseController;
use App\Models\AboutPageContentModel;

class About extends BaseController
{
    public function index()
    {
        // Load the model and fetch the content
        $model = new AboutPageContentModel();
        $aboutContent = $model->first(); // Assuming you only have one record for the about page content

        // Pass the content to the view
        return view('ImsViews/about/index', ['aboutContent' => $aboutContent]);
    }
}