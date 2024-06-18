<?php

namespace App\Controllers\ImsControllers;

use App\Controllers\BaseController;

class settings extends BaseController
{
    public function index()
    {
        return view('ImsViews/settings/index');
    }
}