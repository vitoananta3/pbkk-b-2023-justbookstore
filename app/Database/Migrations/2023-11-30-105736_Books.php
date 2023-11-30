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
                'constraint'        => 10,0
            ],
            'stock' => [
                'type'              => 'INT',
                'constraint'        => 11
            ],
            'cover' => [
                'type'              => 'VARCHAR',
                'constraint'        => 255
            ],
            
        ]);
    }

    public function down()
    {
        //
    }
}
