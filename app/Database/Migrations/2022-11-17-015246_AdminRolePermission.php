<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AdminRolePermission extends Migration
{
    protected $tableName  = 'admin_role_permission';
    
    public function up()
    {
        $this->forge->addField([
            'role_id' => [
                'type'              => 'INT',
                'constraint'        => 4,
                'unsigned'          => true,
            ],
            'permission_id' => [
                'type'              => 'INT',
                'constraint'        => 4,
                'unsigned'          => true,
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
        $this->forge->addForeignKey('role_id', 'admin_roles', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('permission_id', 'admin_permissions', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable($this->tableName);
    }


    public function down()
    {
        $this->forge->dropTable($this->tableName);
    }
}
