<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;


class CategoryController extends ResourceController
{
    protected $modelName = 'App\Models\Admin\CategoryModel';
    protected $format = 'json';

    public function index()
    {
        // Simplify limit and page retrieval with direct fallbacks for null coalescing
        $limit = $this->request->getGet('limit') ?? 10;

        $page = $this->request->getGet('page') ?? 0;
        $page = (($page ? $page - 1 : 0));

        $search = $this->request->getGet('search') ?? '';

        // Calculate offset only once
        $offset = ($page - 1) * $limit;

        // Prepare common query conditions to avoid repetition
        $baseQuery = $this->model->like('name', $search, 'both')->where('status', 'active');

        // Retrieve filtered result set
        $result = $baseQuery->orderBy('id', 'desc')->findAll($limit, ($page * $limit));

        // Count total items matching the criteria without limit and offset
        $totalCount = $baseQuery->countAllResults();

        // Calculate total pages only once
        $totalPages = ceil($totalCount / $limit);

        if (empty($result)) {
            return $this->respondNoContent('No Content');
        }


        // map $result to add image path and remove created_at and updated_at
        foreach ($result as $key => $value) {
            $result[$key]->image_path = base_url('public/uploads/images/categories/');

            // unset created_at and updated_at
            unset($result[$key]->created_at);
            unset($result[$key]->updated_at);
        }

        $data = [
            'total_count' => $totalCount,
            'total_pages' => $totalPages,
            'pages_remaining' => $totalPages - ($page ? $page + 1 : 1),
            'current_page' => ($page ? $page + 1 : 1),
            'data' => $result
        ];

        return $this->respond($data, 200, 'Data found');
    }

    public function show($id = null)
    {
        $data = $this->model->find($id);

        $data->image_path = base_url('public/uploads/images/categories/');

        unset($data->created_at);
        unset($data->updated_at);

        if (empty($data)) {
            return $this->respondNoContent('No data found');
        }

        return $this->respond($data, 200, 'Data found');
    }
}
