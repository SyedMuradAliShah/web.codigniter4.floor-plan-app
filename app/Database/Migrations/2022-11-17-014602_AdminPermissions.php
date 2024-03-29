<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AdminPermissions extends Migration
{
    protected $tableName = 'admin_permissions';

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
                'constraint'        => 30,
            ],
            'key' => [
                'type'              => 'VARCHAR',
                'constraint'        => 30,
            ],
            'perm_view' => [
                'type'              => 'TINYINT',
                'constraint'        => 1,
                'default'           => 0
            ],
            'perm_add' => [
                'type'              => 'TINYINT',
                'constraint'        => 1,
                'default'           => 0
            ],
            'perm_edit' => [
                'type'              => 'TINYINT',
                'constraint'        => 1,
                'default'           => 0
            ],
            'perm_delete' => [
                'type'              => 'TINYINT',
                'constraint'        => 1,
                'default'           => 0
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
