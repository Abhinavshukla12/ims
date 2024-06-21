<?php

namespace App\Models;

use CodeIgniter\Model;

class StockModel extends Model
{
    protected $table = 'stock';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description', 'quantity', 'price'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
