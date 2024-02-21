<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AdminRoles extends Migration
{
    protected $tableName = 'admin_roles';

    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 4,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'              => 'VARCHAR',
                'constraint'        => 50,
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
