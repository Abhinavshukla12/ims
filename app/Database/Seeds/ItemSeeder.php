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

        for ($i = 0; $i < 10000; $i++) {
            // Generate a random created_at date within the last year
            $created_at = $faker->dateTimeBetween('-2 year', 'now')->format('Y-m-d H:i:s');
            // Ensure the updated_at is after the created_at date
            $updated_at = $faker->dateTimeBetween($created_at, 'now')->format('Y-m-d H:i:s');

            $data[] = [
                'name'        => $faker->word,
                'description' => $faker->sentence,
                'price'       => $faker->randomFloat(2, 1, 1000),
                'quantity'    => $faker->numberBetween(1, 100),
                'created_at'  => $created_at,
                'updated_at'  => $updated_at,
            ];
        }

        // Using Query Builder
        $this->db->table('items')->insertBatch($data);
    }
}
