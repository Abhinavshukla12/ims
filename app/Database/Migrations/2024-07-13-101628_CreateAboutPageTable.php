<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAboutPageTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'page_title' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'introductory_paragraphs' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'key_features' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'contact_us' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('about_page_content');
    }

    public function down()
    {
        $this->forge->dropTable('about_page_content');
    }
}
