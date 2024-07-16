<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DocumentsSeeder extends Seeder
{
    public function run()
    {
        $data = [];

        for ($i = 1; $i <= 10000; $i++) {
            $data[] = [
                'name'        => 'Document ' . $i,
                'title'       => 'Title ' . $i,
                'description' => 'Description for Document ' . $i,
                'file_path'   => 'path/to/file' . $i . '.pdf',
            ];
        }

        // Using Query Builder
        $this->db->table('documents')->insertBatch($data);
    }
}
