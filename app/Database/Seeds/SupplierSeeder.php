<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class SupplierSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $data = [];

        for ($i = 0; $i < 10000; $i++) {
            $data[] = [
                'name'        => $faker->company,
                'contact'     => $faker->phoneNumber,
                'address'     => $faker->address,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ];
        }

        // Using Query Builder
        $this->db->table('suppliers')->insertBatch($data);
    }
}
