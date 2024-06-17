<?php

namespace App\Controllers\ImsControllers\SettingsControllers;

use App\Controllers\BaseController;

class settings extends BaseController
{
    public function index()
    {
        return view('ImsViews/settings/index');
    }
}