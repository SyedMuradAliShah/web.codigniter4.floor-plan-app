<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Admins extends Migration
{
    protected $tableName = 'admins';

    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'INT',
                'constraint'        => 3,
                'unsigned'          => true,
                'auto_increment'    => true
            ],
            'role_id' => [
                'type'              => 'INT',
                'constraint'        => 4,
                'unsigned'          => true,
                'null'              => true,
            ],
            'full_name' => [
                'type'              => 'VARCHAR',
                'constraint'        => 100
            ],
            'full_address' => [
                'type'              => 'VARCHAR',
                'constraint'        => 500
            ],
            'phone' => [
                'type'              => 'VARCHAR',
                'constraint'        => 15
            ],
            'email' => [
                'type'              => 'VARCHAR',
                'constraint'        => 100,
            ],
            'password' => [
                'type'              => 'VARCHAR',
                'constraint'        => 100,
            ],
            'reset_password_token'  => [
                'type'              => 'VARCHAR',
                'constraint'        => 40,
                'null'              => true
            ],
            'image' => [
                'type'              => 'VARCHAR',
                'constraint'        => 100,
                'null'              => TRUE
            ],
            'image_thumb' => [
                'type'              => 'VARCHAR',
                'constraint'        => 100,
                'null'              => TRUE
            ],
            'status' => [
                'type'              => 'ENUM',
                'constraint'        => ['active', 'suspended'],
                'default'           => 'active',
            ],
            'last_login' => [
                'type'              => 'TIMESTAMP',
                'null'              => true
            ],
            'last_ip' => [
                'type'              => 'VARCHAR',
                'constraint'        => 100,
                'null'              => TRUE
            ],
            'password_reset_at' => [
                'type'              => 'TIMESTAMP',
                'null'              => true
            ],
            'deleted' => [
                'type'              => 'INT',
                'constraint'        => 1,
                'default'           => 0,
            ],
            'deleted_at' => [
                'type'              => 'TIMESTAMP',
                'null'              => true
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
        $this->forge->addForeignKey('role_id', 'admin_roles', 'id', 'CASCADE', 'RESTRICT');
        $this->forge->createTable($this->tableName);
    }

    public function down()
    {
        $this->forge->dropTable($this->tableName);
    }
}
