<?php

namespace App\Controllers\ImsControllers\Inventary_transaction;

use App\Controllers\BaseController;

class stock_out extends BaseController
{
    public function index()
    {
        $data = [];
        return view('ImsViews/inventary_transaction/stock_out/index', $data);
    }
}