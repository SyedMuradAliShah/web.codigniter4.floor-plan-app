<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminRolePermissionSeeder extends Seeder
{
    protected $tableName = 'admin_role_permission';

    public function run()
    {
        $this->db->disableForeignKeyChecks();
        $this->db->table($this->tableName)->truncate();
        $this->db->enableForeignKeyChecks();
        
        $data = [];

        foreach ($this->db->table('admin_permissions')->get()->getResult() as $permission) {
            $data[] = [
                'role_id'           =>  1,
                'permission_id'     =>  $permission->id,
                'perm_add'          => ($permission->perm_add) ? 1 : 0,
                'perm_edit'         => ($permission->perm_edit) ? 1 : 0,
                'perm_view'         => ($permission->perm_view) ? 1 : 0,
                'perm_delete'       => ($permission->perm_delete) ? 1 : 0
            ];
        }

        $this->db->table($this->tableName)->insertBatch($data);
    }
}
