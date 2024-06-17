<?php

namespace App\Controllers\ImsControllers;

use App\Controllers\BaseController;

class supplier_database extends BaseController
{
    public function index()
    {
        return view('ImsViews/supplier_database/index');
    }
}