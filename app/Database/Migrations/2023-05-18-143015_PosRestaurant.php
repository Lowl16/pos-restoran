<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

use function PHPSTORM_META\type;

class PosRestaurant extends Migration
{
    public function up()
    {
        // Create table users
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'role' => [
                'type' => 'ENUM',
                'constraint' => ['admin', 'cashier', 'customer'],
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');

        // Create table tables
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'size' => [
                'type' => 'ENUM',
                'constraint' => ['small', 'medium', 'large'],
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tables');

        // Create table menus
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'price' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
            'description' => [
                'type' => 'TEXT',
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('menus');

        // Create table orders
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'table_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'product_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'product_quantity' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'order_date' => [
                'type' => 'DATETIME',
            ],
            'order_status' => [
                'type' => 'ENUM',
                'constraint' => ['PENDING', 'UNPAID', 'PAID'],
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('table_id', 'tables', 'id');
        $this->forge->addForeignKey('user_id', 'users', 'id');
        $this->forge->addForeignKey('product_id', 'menus', 'id');
        $this->forge->createTable('orders');

        // Create table reports
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'report_date' => [
                'type' => 'DATE',
            ],
            'total_order' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'total_income' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('reports');
    }

    public function down()
    {
        $this->forge->dropTable('order_items');
        $this->forge->dropTable('orders');
        $this->forge->dropTable('menus');
        $this->forge->dropTable('tables');
        $this->forge->dropTable('users');
        $this->forge->dropTable('reports');
    }
}
