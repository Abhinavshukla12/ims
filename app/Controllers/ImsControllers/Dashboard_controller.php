<?php

namespace App\Controllers\ImsControllers;

use App\Controllers\BaseController;

class Dashboard_controller extends BaseController
{
    public function index()
    {
        return view('ImsViews/dashboard/index');
    }
}
