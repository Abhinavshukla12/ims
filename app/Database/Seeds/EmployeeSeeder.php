<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $data = [];

        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'first_name' => $faker->firstName,
                'last_name'  => $faker->lastName,
                'email'      => $faker->email,
                'phone'      => $faker->phoneNumber,
                'position'   => $faker->jobTitle,
                'salary'     => $faker->randomFloat(2, 30000, 100000),
                'hire_date'  => $faker->date(),
                'status'     => $faker->randomElement(['active', 'inactive']),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }

        // Using Query Builder
        $this->db->table('employees')->insertBatch($data);
    }
}
