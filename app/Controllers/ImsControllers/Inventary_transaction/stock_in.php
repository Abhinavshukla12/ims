<?php

namespace App\Controllers\ImsControllers\Inventary_transaction;

use App\Models\StockModel;
use App\Controllers\BaseController;

class stock_in extends BaseController
{
    public function index()
    {
        return view('ImsViews/inventary_transaction/stock_in/index');
    }
}