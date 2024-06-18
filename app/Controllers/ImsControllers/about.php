<?php

namespace App\Controllers\ImsControllers;

use App\Controllers\BaseController;

class about extends BaseController
{
    public function index()
    {
        return view('ImsViews/about/index');
    }
}
