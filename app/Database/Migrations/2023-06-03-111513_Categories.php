<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Database\Migration;

class Categories extends Migration
{
    protected $tableName = 'categories';

    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true
            ],
            'name' => [
                'type'              => 'VARCHAR',
                'constraint'        => 100
            ],
            'image' => [
                'type'              => 'VARCHAR',
                'constraint'        => 300,
                'null'              => TRUE
            ],
            'status' => [
                'type'              => 'ENUM',
                'constraint'        => ['active', 'in active'],
                'default'           => 'active',
            ],
            'updated_at' => [
                'type'              => 'TIMESTAMP',
                'default'           => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'created_at' => [
                'type'              => 'TIMESTAMP',
                'default'           => new RawSql('CURRENT_TIMESTAMP'),
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable($this->tableName);
    }

    public function down()
    {
        $this->forge->dropTable($this->tableName);
    }
}
