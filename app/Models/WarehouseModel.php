<?php

namespace App\Models;

use CodeIgniter\Model;

class WarehouseModel extends Model
{
    protected $table = 'warehouses';
    protected $primaryKey = 'warehouseID';
    protected $allowedFields = ['name', 'location', 'CreatedAt','UpdatedAt'];
}