<?php

namespace App\Controllers\ImsControllers\Inventary_transaction;

use App\Controllers\BaseController;

class sales_order extends BaseController
{
    public function index()
    {
        return view('ImsViews/inventary_transaction/sales_order/index');
    }
}