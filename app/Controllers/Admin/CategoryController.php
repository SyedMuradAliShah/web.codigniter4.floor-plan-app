<?php

namespace App\Controllers\Admin;

use App\Libraries\Template;
use CodeIgniter\Files\File;
use App\Libraries\Permissions;
use App\Controllers\BaseController;
use App\Models\Admin\CategoryModel;

class CategoryController extends BaseController
{
    protected $permission;

    public function __construct()
    {
        helper('text');
        helper('common');
        helper('date');

        $this->permission = new Permissions(); // Loading Permissions Library
        $this->permission->load_permissions(); // Loading Permissions
    }

    public function index()
    {

        $model = new CategoryModel();

        $data['permission'] = $this->permission;
        $data['title'] = "Categories";

        $data['result'] = $model->orderBy('id', 'desc')->paginate(10);
        $data['pager'] = $model->pager;

        return Template::Admin('category/manage', $data);
    }

    public function add()
    {

        try {
            try {
                $this->permission->check_permission('categories', 'add');
            } catch (\Exception $e) {
                if (is_post())
                    die($this->api->error($e->getMessage()));

                return redirect()->to(route_to('admin_dashboard') . '?error=' . $e->getMessage());
            }

            if (!is_post()) {

                $data['permission'] = $this->permission;
                $data['title'] = "Add Category";

                return Template::Admin('category/new', $data);
            }


            $this->validation->setRule('name', 'name', 'required|trim|strip_tags|max_length[15]');
            $this->validation->setRule('image', 'image', 'uploaded[image]|ext_in[image,webp,png,jpg,jpeg]|max_size[image,5120]');
            $this->validation->setRule('status', 'status', 'required|trim|strip_tags|in_list[active,in active]');


            if ($this->validation->withRequest($this->request)->run() == false) {
                $errors = '';
                foreach (array_reverse($this->validation->getErrors()) as $error) {
                    $errors .= "<p>{$error}</p>\n";
                }

                die($this->api->error($errors));
            }

            $data = [
                'name'      =>  $this->request->getPost('name'),
                'status'    =>  $this->request->getPost('status'),
            ];

            if ($img = $this->request->getFile('image')) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $newName = $img->getRandomName();
                    $path = getcwd() . '/public/uploads/images/categories/';
                    $img->move($path, $newName);
                    $imageUpload = new File("{$path}/{$newName}");

                    $data['image'] = $imageUpload->getBasename();
                }
            }

            $model = new CategoryModel();

            if ($model->insert($data)) {
                die($this->api->success('Saved successfully', false, ['redirect' => base_url(route_to('admin_category'))]));
            } else {
                die($this->api->error('Failed to save'));
            }
        } catch (\Exception $e) {
            if (is_post())
                die($this->api->error($e->getMessage()));

            return redirect()->to(route_to('admin_dashboard') . '?error=' . $e->getMessage());
        }
    }

    public function edit($id)
    {

        try {
            try {
                $this->permission->check_permission('categories', 'edit');
            } catch (\Exception $e) {
                if (is_post())
                    die($this->api->error($e->getMessage()));

                return redirect()->to(route_to('admin_dashboard') . '?error=' . $e->getMessage());
            }
            $model = new CategoryModel();

            if (!is_post()) {

                $data['permission'] = $this->permission;
                $data['title'] = "Edit Category";
                $data['row'] = $model->where('id', $id)->first();

                return Template::Admin('category/edit', $data);
            }


            $this->validation->setRule('name', 'name', 'required|trim|strip_tags|max_length[15]');
            $this->validation->setRule('status', 'status', 'required|trim|strip_tags|in_list[active,in active]');


            if ($img = $this->request->getFile('image')) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $this->validation->setRule('image', 'image', 'uploaded[image]|ext_in[image,webp,png,jpg,jpeg]|max_size[image,5120]');
                }
            }

            if ($this->validation->withRequest($this->request)->run() == false) {
                $errors = '';
                foreach (array_reverse($this->validation->getErrors()) as $error) {
                    $errors .= "<p>{$error}</p>\n";
                }

                die($this->api->error($errors));
            }

            $data = [
                'name'      =>  $this->request->getPost('name'),
                'status'    =>  $this->request->getPost('status'),
            ];

            if ($img = $this->request->getFile('image')) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $newName = $img->getRandomName();
                    $path = getcwd() . '/public/uploads/images/categories/';
                    $img->move($path, $newName);
                    $imageUpload = new File("{$path}/{$newName}");

                    $data['image'] = $imageUpload->getBasename();
                }
            }

            if ($img = $this->request->getFile('image')) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $newName = $img->getRandomName();
                    $path = getcwd() . '/public/uploads/images/floors/';
                    $img->move($path, $newName);
                    $imageUpload = new File("{$path}/{$newName}");

                    $data['image'] = $imageUpload->getBasename();
                }
            }

            if ($model->update($id, $data)) {
                die($this->api->success('Saved successfully', false, ['redirect' => base_url(route_to('admin_category'))]));
            } else {
                die($this->api->error('Failed to save'));
            }
        } catch (\Exception $e) {
            if (is_post())
                die($this->api->error($e->getMessage()));

            return redirect()->to(route_to('admin_dashboard') . '?error=' . $e->getMessage());
        }
    }
}