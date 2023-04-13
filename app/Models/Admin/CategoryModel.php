<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class CategoryModel extends Model
{
   
    protected $table            = 'category';
    protected $allowedFields    = ['title', 'slug', 'description', 'keywords', 'content'];

  

    // Validation
    protected $validationRules      = [
        'title' => 'required'
    ];

    protected $afterInsert  = [];
   

   
}
