<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OptionsSeeder extends Seeder
{
    protected $tableName = 'options';

    public function run()
    {
        $this->db->disableForeignKeyChecks();
        $this->db->table($this->tableName)->truncate();
        $this->db->enableForeignKeyChecks();

        $data = [
            [
                'key'       => 'web_name',
                'value'     => 'Floor Plans'
            ],
            [
                'key'       => 'logo',
                'value'     => 'demo-logo.webp'
            ],
        ];

        $this->db->table($this->tableName)->insertBatch($data);
    }
}
