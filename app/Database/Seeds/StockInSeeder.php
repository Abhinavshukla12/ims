<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class StockInSeeder extends Seeder
{
    public function run()
    {
        $data = [ 
            'item_id' => 1,
            'quantity' => 100,
            'transaction_date' => Time::today()->toDateString(),
            'remarks' => 'Initial stock in',
            'created_at' => Time::now(),
            'updated_at' => Time::now(),
        ];

        $this->db->table('stock_in')->insert($data);
    }
}
