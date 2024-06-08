<?php

namespace App\Controllers\ImsControllers\AboutControllers;

use App\Controllers\BaseController;

class about extends BaseController
{
    public function index()
    {
        $data = [];
        return view('ImsViews/about/index', $data);
    }
}
