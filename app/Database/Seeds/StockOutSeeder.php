<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class StockOutSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'item_id' => 1,
            'quantity' => 50,
            'transaction_date' => Time::today()->toDateString(),
            'remarks' => 'Initial stock out',
            'created_at' => Time::now(),
            'updated_at' => Time::now(),
        ];

        $this->db->table('stock_out')->insert($data);
    }
}
