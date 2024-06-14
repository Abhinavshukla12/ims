<?php

namespace App\Controllers\ImsControllers\CategoriesControllers;

use App\Controllers\BaseController;

class categories extends BaseController
{
    public function index()
    {
        return view('ImsViews/categories/index');
    }
}