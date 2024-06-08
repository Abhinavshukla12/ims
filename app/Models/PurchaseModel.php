<?php

namespace App\Models;

use CodeIgniter\Model;

class PurchaseModel extends Model
{
    protected $table = 'purchaseorder';
    protected $primaryKey = 'PurchaseOrderID';
    protected $allowedFields = ['name', 'OrderDate', 'SupplierID','TotalAmount','Status','CreatedAt','UpdatedAt'];
}