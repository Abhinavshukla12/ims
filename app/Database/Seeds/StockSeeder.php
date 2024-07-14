<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class StockSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $data = [];

        for ($i = 0; $i < 1000; $i++) {
            $data[] = [
                'name'        => $faker->word,
                'description' => $faker->sentence,
                'quantity'    => $faker->numberBetween(1, 1000),
                'price'       => $faker->randomFloat(0, 1, 10000),
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ];
        }

        // Using Query Builder
        $this->db->table('stock')->insertBatch($data);
    }
}
