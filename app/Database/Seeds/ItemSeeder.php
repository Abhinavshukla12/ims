<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class ItemSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $data = [];

        for ($i = 0; $i < 1000; $i++) {
            $data[] = [
                'name'        => $faker->word,
                'description' => $faker->sentence,
                'price'       => $faker->randomFloat(2, 1, 1000),
                'quantity'    => $faker->numberBetween(1, 100),
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ];
        }

        // Using Query Builder
        $this->db->table('items')->insertBatch($data);
    }
}
