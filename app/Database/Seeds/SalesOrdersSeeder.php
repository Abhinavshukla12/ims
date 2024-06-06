<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class SalesOrdersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'item_id' => 1,
            'quantity' => 150,
            'order_date' => Time::today()->toDateString(),
            'remarks' => 'Initial sales order',
            'created_at' => Time::now(),
            'updated_at' => Time::now(),
        ];

        $this->db->table('sales_orders')->insert($data);
    }
}
