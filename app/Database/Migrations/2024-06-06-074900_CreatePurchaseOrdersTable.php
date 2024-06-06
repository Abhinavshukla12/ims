<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePurchaseOrdersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'purchase_order_id' => [
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
            'order_date' => [
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
        $this->forge->addKey('purchase_order_id', true);
        $this->forge->createTable('purchase_orders');
    }

    public function down()
    {
        $this->forge->dropTable('purchase_orders');
    }
}
