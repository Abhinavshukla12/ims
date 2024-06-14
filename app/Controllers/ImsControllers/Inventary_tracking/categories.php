<?php

namespace App\Controllers\ImsControllers\Inventary_tracking;

use App\Controllers\BaseController;

class categories extends BaseController
{
    public function index()
    {
        $data['css'] = [
            'assets/css/inventary_tracking/categories/main.css'
        ];
        return view('ImsViews/inventary_tracking/categories/index', $data);
    }
}