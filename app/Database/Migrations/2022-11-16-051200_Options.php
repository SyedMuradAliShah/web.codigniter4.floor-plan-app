<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Options extends Migration
{
    protected $tableName = 'options';

    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'INT',
                'constraint'        => 5,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'key' => [
                'type'              => 'VARCHAR',
                'constraint'        => 200,
            ],
            'value' => [
                'type'              => 'TEXT',
                'null'              => true,
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
