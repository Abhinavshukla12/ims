<?php

namespace App\Controllers\ImsControllers;

use App\Controllers\BaseController;

class Dashboard_controller extends BaseController
{
    public function index()
    {
        $data = [];
        return view('ImsViews/dashboard/index', $data);
    }
}
