<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateStockOutTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'stock_out_id' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'item_id' => [
                'type' => 'INT',
                'null' => false,
            ],
            'quantity' => [
                'type' => 'INT',
                'null' => false,
            ],
            'transaction_date' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'remarks' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('stock_out_id', true);
        $this->forge->createTable('stock_out');
    }

    public function down()
    {
        $this->forge->dropTable('stock_out');
    }
}
