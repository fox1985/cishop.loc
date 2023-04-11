<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class User extends BaseController
{
    public function login()
    {
       return view('admin/user/login', ['title' => 'Login']);
    }
}
