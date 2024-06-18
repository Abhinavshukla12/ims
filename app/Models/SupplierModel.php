<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
    protected $table = 'suppliers';
    protected $primaryKey = 'supplier_id';
    protected $allowedFields = ['name', 'contact', 'address'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
