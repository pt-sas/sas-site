<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Menu extends BaseController
{

    public function index()
    {
        return view('admin/menu2/v_menu');
    }
}
