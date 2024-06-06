<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class PurchaseOrdersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'item_id' => 1,
            'quantity' => 200,
            'order_date' => Time::today()->toDateString(),
            'remarks' => 'Initial purchase order',
            'created_at' => Time::now(),
            'updated_at' => Time::now(),
        ];

        $this->db->table('purchase_orders')->insert($data);
    }
}
