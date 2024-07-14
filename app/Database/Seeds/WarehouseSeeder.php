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

        for ($i = 0; $i < 1000; $i++) {
            $data[] = [
                'name'        => $faker->company,
                'street'      => $faker->streetAddress,
                'city'        => $faker->city,
                'state'       => $faker->state,
                'capacity'    => $faker->numberBetween(1000, 5000),
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ];
        }

        // Using Query Builder
        $this->db->table('warehouses')->insertBatch($data);
    }
}
