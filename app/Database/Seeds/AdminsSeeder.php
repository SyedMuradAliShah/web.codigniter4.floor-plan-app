<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminsSeeder extends Seeder
{
    protected $tableName = 'admins';

    public function run()
    {
        $this->db->disableForeignKeyChecks();
        $this->db->table($this->tableName)->truncate();
        $this->db->enableForeignKeyChecks();

        $data = [
            [
                'full_name'     => 'Murad Ali',
                'email'         => 'murad@recmail.net',
                'password'      => password_hash('123456', PASSWORD_BCRYPT),
                'role_id'       => 1
            ]
        ];

        $this->db->table($this->tableName)->insertBatch($data);
    }
}
