<?php

namespace App\Controllers\ImsControllers\WarehouseControllers;

use App\Controllers\BaseController;

class warehouse extends BaseController
{
    public function index()
    {
        return view('ImsViews/warehouse/index');
    }
}