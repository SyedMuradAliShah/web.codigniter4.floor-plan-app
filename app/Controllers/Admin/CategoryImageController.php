<?php

namespace App\Controllers\Admin;

use App\Libraries\Template;
use CodeIgniter\Files\File;
use App\Libraries\Permissions;
use App\Controllers\BaseController;
use App\Models\Admin\CategoryModel;
use App\Models\Admin\CategoryImageModel;

class CategoryImageController extends BaseController
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

        $model = new CategoryImageModel();

        $data['permission'] = $this->permission;
        $data['title'] = "Category Images";
        $data['categories'] = (new CategoryModel())->findAll();

        $data['result'] = $model->with_categories($this->request->getGet('search'), $this->request->getGet('cat_id'))->orderBy("{$model->table}.id", 'desc')->paginate(10);

        $data['pager'] = $model->pager;

        return Template::Admin('category_image/manage', $data);
    }



    public function add()
    {

        try {
            try {
                $this->permission->check_permission('category_images', 'add');
            } catch (\Exception $e) {
                if (is_post())
                    die($this->api->error($e->getMessage()));

                return redirect()->to(route_to('admin_dashboard') . '?error=' . $e->getMessage());
            }

            if (!is_post()) {

                $data['permission'] = $this->permission;
                $data['title'] = "Add Category Image";
                $data['categories'] = (new CategoryModel())->findAll();

                return Template::Admin('category_image/new', $data);
            }

            $this->validation->setRule('category_id', 'category', 'required|trim|strip_tags');
            $this->validation->setRule('name', 'name', 'required|trim|strip_tags|max_length[15]');
            $this->validation->setRule('image', 'image', 'uploaded[image]|ext_in[image,webp,png,jpg,jpeg]|max_size[image,5120]');

            if ($this->validation->withRequest($this->request)->run() == false) {
                $errors = '';
                foreach (array_reverse($this->validation->getErrors()) as $error) {
                    $errors .= "<p>{$error}</p>\n";
                }

                die($this->api->error($errors));
            }

            $data = [
                'name'          => $this->request->getPost('name'),
                'category_id'   => $this->request->getPost('category_id'),
            ];

            if ($img = $this->request->getFile('image')) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $newName = $img->getRandomName();
                    $path = getcwd() . '/public/uploads/images/floors/';
                    $img->move($path, $newName);
                    $imageUpload = new File("{$path}/{$newName}");

                    $data['image'] = $imageUpload->getBasename();
                }
            }


            $model = new CategoryImageModel();

            if ($model->insert($data)) {
                die($this->api->success('Saved successfully', false, ['redirect' => base_url(route_to('admin_category_images'))]));
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
                $this->permission->check_permission('category_images', 'edit');
            } catch (\Exception $e) {
                if (is_post())
                    die($this->api->error($e->getMessage()));

                return redirect()->to(route_to('admin_dashboard') . '?error=' . $e->getMessage());
            }
            $model = new CategoryImageModel();

            if (!is_post()) {

                $data['permission'] = $this->permission;
                $data['title'] = "Edit Category Image";
                $data['row'] = $model->with_categories()->where("{$model->table}.id", $id)->first();
                $data['categories'] = (new CategoryModel())->findAll();

                return Template::Admin('category_image/edit', $data);
            }

            $this->validation->setRule('category_id', 'category', 'required|trim|strip_tags');
            $this->validation->setRule('name', 'name', 'required|trim|strip_tags|max_length[15]');

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
                'name'          => $this->request->getPost('name'),
                'category_id'   => $this->request->getPost('category_id'),
            ];

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
                die($this->api->success('Saved successfully', false, ['redirect' => base_url(route_to('admin_category_images'))]));
            } else {
                die($this->api->error('Failed to save'));
            }
        } catch (\Exception $e) {
            if (is_post())
                die($this->api->error($e->getMessage()));

            return redirect()->to(route_to('admin_dashboard') . '?error=' . $e->getMessage());
        }
    }

    public function delete(int $id)
    {
        try {
            try {
                $this->permission->check_permission('category_images', 'delete');
            } catch (\Exception $e) {
                if (is_post())
                    die($this->api->error($e->getMessage()));

                return redirect()->to(route_to('admin_dashboard') . '?error=' . $e->getMessage());
            }

            $model = new CategoryImageModel();

            $row = $model->where("{$model->table}.id", $id)->first();

            if (!$row)
                die($this->api->error('No record found'));

            if ($model->delete($id)) {

                $path = getcwd() . '/public/uploads/images/floors/' . $row->image;

                if (file_exists($path))
                    unlink($path);


                die($this->api->success('Deleted successfully', false, ['reload' => true]));
            } else {
                die($this->api->error('Failed to delete'));
            }
        } catch (\Exception $e) {
            if (is_post())
                die($this->api->error($e->getMessage()));

            return redirect()->to(route_to('admin_category_images') . '?error=' . $e->getMessage());
        }
    }
}
