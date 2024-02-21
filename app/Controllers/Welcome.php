<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Welcome extends BaseController
{
    public function index()
    {
        return redirect()->to('/adminino');
    }

    public function error_404()
    {
        die("Page Not Found");
    }
}
