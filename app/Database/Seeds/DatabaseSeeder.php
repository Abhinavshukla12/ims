<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('StockInSeeder');
        $this->call('StockOutSeeder');
        $this->call('PurchaseOrdersSeeder');
        $this->call('SalesOrdersSeeder');
    }
}
