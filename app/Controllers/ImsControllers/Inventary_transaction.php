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
}
