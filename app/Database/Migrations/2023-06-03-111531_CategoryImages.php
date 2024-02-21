<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Database\Migration;

class CategoryImages extends Migration
{
    protected $tableName = 'category_images';

    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true
            ],
            'category_id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'null'              => true,
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
        $this->forge->addForeignKey('category_id', 'categories', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable($this->tableName);
    }

    public function down()
    {
        $this->forge->dropTable($this->tableName);
    }
}
