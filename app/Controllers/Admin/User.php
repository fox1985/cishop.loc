<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class User extends BaseController
{
    public function login()
    {
       if($this->request->getMethod() == 'post')
       {     // проверка ошибки валидации
            if (!$this->validate('userLogin')) 
            {
              return redirect()->route('admin.login')->with('errors', $this->validator);
            }
       }



       return view('admin/user/login', ['title' => 'Login']);
    }


    
}





