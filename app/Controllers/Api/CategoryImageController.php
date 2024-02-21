<?php

namespace App\Controllers\Api;

use App\Models\Admin\CategoryImageModel;
use CodeIgniter\RESTful\ResourceController;


class CategoryImageController  extends ResourceController
{
    protected $modelName = 'App\Models\Admin\CategoryImageController';
    protected $format    = 'json';

    public function index()
    {
        $model = new CategoryImageModel();

        $limit = $this->request->getGet('limit') ?? 10;

        $page = $this->request->getGet('page') ?? 0;
        $page = (($page ? $page - 1 : 0));

        $search = $this->request->getGet('search') ?? '';

        $category_id = $this->request->getGet('category_id') ?? null;

        $result = $model->where("{$model->categories}.status", 'active')->with_categories($search, $category_id)->orderBy('id', 'desc')->findAll($limit, ($page * $limit));


        $totalCount = $model->where("{$model->categories}.status", 'active')->with_categories($search, $category_id)->countAllResults();

        // total pages
        $totalPages = ceil($totalCount / $limit);

        if (empty($result)) {
            return $this->respondNoContent('No data found');
        }


        // map $result to add image path and remove created_at and updated_at
        foreach ($result as $key => $value) {
            $result[$key]->image_path = base_url('public/uploads/images/floors/');

            // unset created_at and updated_at
            unset($result[$key]->created_at);
            unset($result[$key]->updated_at);
        }

        $data = [
            'total_count'       => $totalCount,
            'total_pages'       => $totalPages,
            'pages_remaining'   => $totalPages - ($page ? $page + 1 : 1),
            'current_page'      => ($page ? $page + 1 : 1),
            'data'              => $result
        ];

        return $this->respond($data, 200, 'Data found');
    }

    public function show($id = null)
    {
        $model = new CategoryImageModel();

        $data = $model->where("{$model->categories}.status", 'active')->with_categories()->find($id);

        if (empty($data)) {
            return $this->respondNoContent('No data found');
        }

        $data->image_path = base_url('public/uploads/images/floors/');

        unset($data->created_at);
        unset($data->updated_at);


        return $this->respond($data, 200, 'Data found');
    }
}
