<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminPermissionsSeeder extends Seeder
{
    protected $tableName = 'admin_permissions';

    public function run()
    {
        $this->db->disableForeignKeyChecks();
        $this->db->table($this->tableName)->truncate();
        $this->db->enableForeignKeyChecks();

        $data = [
            [
                'key'           =>  'admins',
                'name'          =>  'Admins',
                'perm_view'     =>  1,
                'perm_add'      =>  1,
                'perm_edit'     =>  1,
                'perm_delete'   =>  0
            ],
            [
                'key'           =>  'admin_roles',
                'name'          =>  'Admin Roles',
                'perm_view'     =>  1,
                'perm_add'      =>  1,
                'perm_edit'     =>  1,
                'perm_delete'   =>  0
            ],
            [
                'key'           =>  'categories',
                'name'          =>  'Categories',
                'perm_view'     =>  1,
                'perm_add'      =>  1,
                'perm_edit'     =>  1,
                'perm_delete'   =>  0
            ],
            [
                'key'           =>  'category_images',
                'name'          =>  'Category Images',
                'perm_view'     =>  1,
                'perm_add'      =>  1,
                'perm_edit'     =>  1,
                'perm_delete'   =>  1
            ],
            [
                'key'           =>  'settings',
                'name'          =>  'Settings',
                'perm_view'     =>  1,
                'perm_add'      =>  0,
                'perm_edit'     =>  1,
                'perm_delete'   =>  0
            ]
        ];

        $this->db->table($this->tableName)->insertBatch($data);
    }
}
