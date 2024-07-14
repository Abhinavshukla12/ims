<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class SalesOrderSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $data = [];

        for ($i = 0; $i < 1000; $i++) {
            $data[] = [
                'customer_id' => $faker->numberBetween(1, 100), // Adjust the range according to your customer IDs
                'name'        => $faker->word,
                'address'     => $faker->address,
                'order_date'  => $faker->date(),
                'quantity'    => $faker->numberBetween(1, 100),
                'price'       => $faker->randomFloat(2, 10, 500),
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ];
        }

        // Using Query Builder
        $this->db->table('sales_orders')->insertBatch($data);
    }
}
