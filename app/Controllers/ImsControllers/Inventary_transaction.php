<?php

namespace App\Controllers\ImsControllers;

use App\Controllers\BaseController;

class Inventary_transaction extends BaseController
{
    public function stock_in()
    {
        $data = [];
        return view('ImsViews/inventary_transaction/stock_in', $data);
    }
    public function stock_out()
    {
        $data = [];
        return view('ImsViews/inventary_transaction/stock_out', $data);
    }
    public function purchase_order()
    {
        $data = [];
        return view('ImsViews/inventary_transaction/purchase_order', $data);
    }
    public function sales_order()
    {
        $data = [];
        return view('ImsViews/inventary_transaction/sales_order', $data);
    }
}
