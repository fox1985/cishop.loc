<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\CategoryModel;

class Category extends BaseController
{
    private $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        $categories = $this->categoryModel
        ->select('category.id, category.title, COUNT(product.id) AS cnt' )
        ->join('product', 'product.category_id = category.id', 'left')
        ->groupBy('category.id')
        ->orderBy('category.title')
        ->paginate();
    d($categories);
    }
}
