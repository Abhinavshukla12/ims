<?php

namespace App\Controllers\ImsControllers\SettingsControllers;

use App\Controllers\BaseController;

class settings extends BaseController
{
    public function index()
    {
        $data['css'] = [
            'assets/css/settings/main.css'
        ];
        return view('ImsViews/settings/index', $data);
    }
}