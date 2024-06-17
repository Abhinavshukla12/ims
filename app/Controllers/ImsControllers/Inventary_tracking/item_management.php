<?php

namespace App\Controllers\ImsControllers\Inventary_tracking;

use App\Controllers\BaseController;

class item_management extends BaseController
{
    public function index()
    {
        return view('ImsViews/inventary_tracking/item_management/index');
    }
}