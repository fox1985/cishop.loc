<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class UserModel extends Model
{
   
    protected $table            = 'user';
    protected $allowedFields    = ['name', 'email', 'password', 'role', 'address'];


    // Validation
    protected $validationRules      = [];

    protected $beforeInsert   = [];

    protected $beforeUpdate   = [];


    public function checkPassword($data_password, $user_password): bool
    {
        return password_verify($data_password, $user_password);
    }


    public function setProfile($user)
    {
//        $session = session();

        $user_data = [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'address' => $user['address'],
            'role' => $user['role'],
        ];
        $_SESSION['user'] = $user_data;
    }




    // Dates
    // protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // Validation
    // protected $validationRules      = [];

    //  protected $validationMessages   = [];

    // protected $afterInsert    = [];
    
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];
}
