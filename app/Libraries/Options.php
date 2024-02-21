<?php

namespace App\Libraries;

use \CodeIgniter\HTTP\URI;
use App\Models\Admin\SettingModel;

class Options
{
    protected $options_array = [];

    protected $db;

    public $key;

    public function __construct()
    {
        $uri = new URI();
        if ($uri->getSegment(1) == 'migrate') return;
    }

    public function load()
    {
        $this->__get_options();
        return $this->key = (object)$this->options_array;
    }

    private function __get_options()
    {
        $model = new SettingModel();
        $options = $model->findAll();
        foreach ($options as $option) {
            $this->options_array[$option->key] = $option->value;
        }
    }
}
