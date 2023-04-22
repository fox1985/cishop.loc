<?php

namespace App\Libraries;

use App\Models\Admin\CategoryModel;

class Category
{
    public function getCategoriesList(int $category_id)
    {
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->select('id, title')->findAll();
        return view('admin/incs/category_list', ['category_id' => $category_id, 'categories' => $categories]);
    }
}


?>