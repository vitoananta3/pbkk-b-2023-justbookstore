<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Books extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true
            ],
            'title' => [
                'type'              => 'VARCHAR',
                'constraint'        => 255
            ],
            'slug' => [
                'type'              => 'VARCHAR',
                'constraint'        => 255
            ],
            'author' => [
                'type'              => 'VARCHAR',
                'constraint'        => 255
            ],
            'publisher' => [
                'type'              => 'VARCHAR',
                'constraint'        => 255
            ],
            'synopsis' => [
                'type'              => 'VARCHAR',
                'constraint'        => 255
            ],
            'price' => [
                'type'              => 'DECIMAL',
                'constraint'        => 10, 0
            ],
            'stock' => [
                'type'              => 'INT',
                'constraint'        => 11
            ],
            'cover' => [
                'type'              => 'VARCHAR',
                'constraint'        => 255
            ],
            'category_id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true
            ],
            'created_at' => [
                'type'              => 'DATETIME',
                'null'              => true
            ],
            'updated_at' => [
                'type'              => 'DATETIME',
                'null'              => true
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('category_id', 'categories', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('books');
    }

    public function down()
    {
        $this->forge->dropTable('books');
    }
}
