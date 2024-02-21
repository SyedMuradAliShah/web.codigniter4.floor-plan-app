<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    protected $tableName = 'categories';

    public function run()
    {
        $this->db->disableForeignKeyChecks();
        $this->db->table($this->tableName)->truncate();
        $this->db->enableForeignKeyChecks();

        $data = [
            [
                'name'     => 'Bedroom',
                'image'    => 'no-image.jpg'
            ],
            [
                'name'     => 'Living Room',
                'image'    => 'no-image.jpg'
            ],
            [
                'name'     => 'Kitchen',
                'image'    => 'no-image.jpg'
            ]
        ];

        $this->db->table($this->tableName)->insertBatch($data);
    }
}
