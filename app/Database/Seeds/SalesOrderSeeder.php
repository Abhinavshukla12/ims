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

        for ($i = 0; $i < 10000; $i++) {
            // Generate a random order date within the last year
            $order_date = $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d');
            // Ensure the created_at and updated_at dates are consistent with the order_date
            $created_at = $faker->dateTimeBetween($order_date, 'now')->format('Y-m-d H:i:s');
            $updated_at = $faker->dateTimeBetween($created_at, 'now')->format('Y-m-d H:i:s');

            $data[] = [
                'customer_id' => $faker->numberBetween(1, 100), // Adjust the range according to your customer IDs
                'name'        => $faker->word,
                'address'     => $faker->address,
                'order_date'  => $order_date,
                'quantity'    => $faker->numberBetween(1, 100),
                'price'       => $faker->randomFloat(2, 10, 500),
                'created_at'  => $created_at,
                'updated_at'  => $updated_at,
            ];
        }

        // Using Query Builder
        $this->db->table('sales_orders')->insertBatch($data);
    }
}
