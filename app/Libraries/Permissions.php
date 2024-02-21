<?php

namespace App\Libraries;

use App\Models\Admin\AdminModel;
use App\Models\Admin\AdminRoleModel;
use App\Models\Admin\AdminPermissionModel;
use App\Models\Admin\AdminRolePermissionModel;


class Permissions
{
    private $session;

    private $admin_permissions;

    private $admin_role_permission;

    private $available_permissions;

    private $role_id;

    private $admin;
    
    private $admin_roles;
    
    private $role_permissions;

    public function __construct()
    {
        $this->session = \Config\Services::session();

        $this->admin = new AdminModel();

        $this->admin_roles = new AdminRoleModel();

        $this->admin_permissions = new AdminPermissionModel();

        $this->admin_role_permission = new AdminRolePermissionModel();

        $this->available_permissions = [];

        $this->role_permissions = [];

        $this->role_id = $this->session->get('admin_role_id') ?? 1;
    }

    public function load_permissions()
    {
        try {

            $this->get_permissions();
            $this->get_role_permissions($this->role_id);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function hasPermission($key, $permission)
    {
        try {

            $permission = "perm_{$permission}";

            if (!isset($this->available_permissions[$key])) {
                return false;
            }

            $available_permission = $this->convert_to_object($this->available_permissions[$key]);

            if (!isset($this->role_permissions[$available_permission->id])) {
                return false;
            }
            // convert to object
            $role_permission = $this->convert_to_object($this->role_permissions[$available_permission->id]);

            if ($available_permission->{$permission} == 1 && $role_permission->{$permission} == 1) {
                return true;
            }
        } catch (\Exception $e) {
            return false;
        }
    }

    public function check_permission($key, $permission)
    {
        try {

            if (!$this->hasPermission($key, $permission)) {
                throw new \Exception("You don't have permission to access this page");
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }


    private function convert_to_object(array $array)
    {
        return json_decode(json_encode($array));
    }

    private function get_permissions()
    {
        try {
            $all_permissions = $this->admin_permissions->findAll();

            $permissions = [];

            foreach ($all_permissions as $permission) {
                $permissions[$permission->key] = [
                    'id'            => $permission->id,
                    'name'          => $permission->name,
                    'key'           => $permission->key,
                    'perm_view'     => $permission->perm_view,
                    'perm_add'      => $permission->perm_add,
                    'perm_edit'     => $permission->perm_edit,
                    'perm_delete'   => $permission->perm_delete
                ];
            }

            return $this->available_permissions = $permissions;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    private function get_role_permissions($role_id)
    {
        try {

            $admin_role_permission = $this->admin_role_permission->where('role_id', $role_id)->findAll();

            $permissions = [];

            foreach ($admin_role_permission as $permission) {
                $permissions[$permission->permission_id] = [
                    'perm_view'     => $permission->perm_view,
                    'perm_add'      => $permission->perm_add,
                    'perm_edit'     => $permission->perm_edit,
                    'perm_delete'   => $permission->perm_delete
                ];
            }

            return $this->role_permissions = $permissions;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
