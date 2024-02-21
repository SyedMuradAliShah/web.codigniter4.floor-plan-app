<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminRolesSeeder extends Seeder
{
    protected $tableName = 'admin_roles';

    public function run()
    {
        $this->db->disableForeignKeyChecks();
        $this->db->table($this->tableName)->truncate();
        $this->db->enableForeignKeyChecks();

        $data = [
            [
                'name'      =>  'Super Admin'
            ],
            [
                'name'      =>  'Manager',
            ]
        ];

        $this->db->table($this->tableName)->insertBatch($data);
    }
}
