<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\ProductModel;

class Product extends BaseController
{

    private $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }





    public function index()
    {
        $products = $this->productModel
            ->select('product.id, product.title, product.price, product.status, category.title AS category_title')
            ->join('category', 'category.id = product.category_id')
            ->orderBy('product.id ASC')
            ->paginate();

        return view('admin/product/index', [
            'title' => 'Список товаров',
            'products' => $products,
            'pager' => $this->productModel->pager,
        ]);
    }
}
