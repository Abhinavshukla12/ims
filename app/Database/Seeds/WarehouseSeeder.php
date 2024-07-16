<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class WarehouseSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $data = [];

        for ($i = 0; $i < 10000; $i++) {
            // Generate a random date within the last year
            $created_at = $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s');
            // Ensure the updated_at is after the created_at
            $updated_at = $faker->dateTimeBetween($created_at, 'now')->format('Y-m-d H:i:s');

            $data[] = [
                'name'        => $faker->company,
                'street'      => $faker->streetAddress,
                'city'        => $faker->city,
                'state'       => $faker->state,
                'capacity'    => $faker->numberBetween(1000, 5000),
                'created_at'  => $created_at,
                'updated_at'  => $updated_at,
            ];
        }

        // Using Query Builder
        $this->db->table('warehouses')->insertBatch($data);
    }
}
