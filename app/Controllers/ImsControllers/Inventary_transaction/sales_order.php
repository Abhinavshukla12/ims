<?php

namespace App\Controllers\ImsControllers\Inventary_transaction;

use App\Controllers\BaseController;

class sales_order extends BaseController
{
    public function index()
    {
        $data = [];
        return view('ImsViews/inventary_transaction/sales_order/index', $data);
    }
}