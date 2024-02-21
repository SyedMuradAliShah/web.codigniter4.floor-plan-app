<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class CategoryImageModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'category_images';
    protected $categories       = 'categories';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
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


    public function with_categories($search = null, $category_id = null)
    {
        $this->builder()->select("{$this->table}.*, {$this->categories}.name as category_name, {$this->categories}.status as category_status");

        $this->builder()->join($this->categories, "{$this->categories}.id = {$this->table}.category_id");

        if (!is_null($search)) {
            $this->builder()->groupStart();
            $this->builder()->like("{$this->table}.name", $search);
            $this->builder()->orLike("{$this->categories}.name", $search);
            $this->builder()->groupEnd();
        }

        if (!is_null($category_id)) {
            $this->builder()->groupStart();
            $this->builder()->where("{$this->categories}.id", $category_id);
            $this->builder()->groupEnd();
        }

        return $this;
    }
}
