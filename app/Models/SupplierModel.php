<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
    protected $table = 'suppliers';
    protected $primaryKey = 'SuppliersID';
    protected $allowedFields = ['SupplierName', 'ContactName','Address', 'City', 'PostalCode', 'Country', 'Phone'];
}