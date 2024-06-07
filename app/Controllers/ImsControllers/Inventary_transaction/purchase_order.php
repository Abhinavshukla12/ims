<?php

namespace App\Controllers\ImsControllers\Inventary_transaction;

use App\Controllers\BaseController;

class purchase_order extends BaseController
{
    public function index()
    {
        $data = [];
        return view('ImsViews/inventary_transaction/purchase_order/index', $data);
    }
}