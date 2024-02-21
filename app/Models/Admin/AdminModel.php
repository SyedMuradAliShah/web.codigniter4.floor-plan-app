<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'admins';
    protected $admin_roles      = 'admin_roles';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function login($email)
    {
        $this->builder()->select("{$this->table}.*, {$this->admin_roles}.name as role_name");
        $this->builder()->join($this->admin_roles, "{$this->admin_roles}.id = {$this->table}.role_id");
        $this->builder()->where("{$this->table}.email", $email);
        $this->builder()->where("{$this->table}.status", 'active');
        $this->builder()->where("{$this->table}.deleted_at", null);
        return $this; // This will allow the call chain to be used.
    }

    public function get_all_admins()
    {
        $this->builder()->select("{$this->table}.*, {$this->admin_roles}.name as role_name");
        $this->builder()->join($this->admin_roles, "{$this->admin_roles}.id = {$this->table}.role_id");
        $this->builder()->where("{$this->table}.deleted_at", null);
        $this->builder()->where("{$this->table}.deleted_at", null);

        return $this; // This will allow the call chain to be used.
    }
}
