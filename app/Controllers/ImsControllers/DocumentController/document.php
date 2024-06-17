<?php

namespace App\Controllers\ImsControllers\DocumentController;

use App\Controllers\BaseController;
use App\Models\DocumentModel;

class document extends BaseController
{
    public function index()
    {
        return view('ImsViews/document/index');
    }
}