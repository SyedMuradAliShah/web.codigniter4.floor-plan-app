<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategoryImagesSeeder extends Seeder
{
    protected $tableName = 'category_images';

    public function run()
    {
        $this->db->disableForeignKeyChecks();
        $this->db->table($this->tableName)->truncate();
        $this->db->enableForeignKeyChecks();

        $data = [
            [
                'category_id'   => 1,
                'name'          => 'Bedroom 1',
                'image'         => 'Bedroom-1.jpg'
            ],
            [
                'category_id'   => 1,
                'name'          => 'Bedroom 2',
                'image'         => 'Bedroom-2.jpg'
            ],
            [
                'category_id'   => 1,
                'name'          => 'Bedroom 3',
                'image'         => 'Bedroom-3.jpg'
            ],
            [
                'category_id'   => 2,
                'name'          => 'Living Room 1',
                'image'         => 'Living-Room-1.jpg'
            ],
            [
                'category_id'   => 2,
                'name'          => 'Living Room 2',
                'image'         => 'Living-Room-2.jpg'
            ],
            [
                'category_id'   => 2,
                'name'          => 'Living Room 3',
                'image'         => 'Living-Room-3.jpg'
            ],
            [
                'category_id'   => 3,
                'name'          => 'Kitchen 1',
                'image'         => 'Kitchen-1.jpg'
            ],
            [
                'category_id'   => 3,
                'name'          => 'Kitchen 2',
                'image'         => 'Kitchen-2.jpg'
            ],
            [
                'category_id'   => 3,
                'name'          => 'Kitchen 3',
                'image'         => 'Kitchen-3.jpg'
            ]
        ];

        $this->db->table($this->tableName)->insertBatch($data);
    }
}
