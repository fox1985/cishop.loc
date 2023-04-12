<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\UserModel;

class User extends BaseController
{
 
  private $userModel;

  public function __construct()
  {
      $this->userModel = new UserModel();
  }


    public function login()
    {
       
        
      
      if ($this->request->getMethod() == 'post') {
        if (!$this->validate('userLogin')) {
            return redirect()->route('admin.login')->with('errors', $this->validator);
        }

        // Get user
        $user = $this->userModel->where('email', $this->request->getPost('email'))
            ->where('role', 'admin')
            ->first();

        // If !user OR !checkPassword
        if (!$user || !$this->userModel->checkPassword($this->request->getPost('password'), $user['password'])) {
            return redirect()->route('admin.login')->with('fail', 'Incorrect email or password');
        }

        // If success validation AND login
        $this->userModel->setProfile($user);
        return redirect()->route('admin.main')->with('success', 'Successful login');
    }



       return view('admin/user/login', ['title' => 'Login']);
    }

    public function logout()
    {
        if(UserModel::isAdmin())
        {
            session()->destroy();
        }

        return redirect('admin.login');
    }


    
}





