<?php

namespace App\Models;

use CodeIgniter\Model;

class SalesOrderModel extends Model
{
    protected $table = 'sales_orders';
    protected $primaryKey = 'order_id ';
    protected $allowedFields = ['customer_id', 'order_date','total_amount','status'];
}