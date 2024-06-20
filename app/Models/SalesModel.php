<?php
namespace App\Models;

use CodeIgniter\Model;

class SalesModel extends Model
{
    protected $table = 'sales_orders';
    protected $primaryKey = 'order_id';
    protected $allowedFields = ['customer_id', 'name', 'address', 'order_date', 'quantity', 'price'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}