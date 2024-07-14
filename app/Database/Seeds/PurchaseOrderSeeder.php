<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class PurchaseOrderSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $data = [];

        for ($i = 0; $i < 1000; $i++) {
            $data[] = [
                'supplier_id' => $faker->numberBetween(1, 100), // Adjust the range according to your supplier IDs
                'name'        => $faker->word,
                'order_date'  => $faker->date(),
                'quantity'    => $faker->numberBetween(1, 100),
                'price'       => $faker->randomFloat(2, 10, 500),
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ];
        }

        // Using Query Builder
        $this->db->table('purchase_orders')->insertBatch($data);
    }
}
