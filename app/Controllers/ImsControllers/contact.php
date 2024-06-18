<?php

namespace App\Controllers\ImsControllers;

use App\Controllers\BaseController;

class contact extends BaseController
{
    public function index()
    {
        return view('ImsViews/contact/index');
    }
}
