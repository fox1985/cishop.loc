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
        ->orderBy('category.id')
        ->paginate();

        return view('admin/category/index', [
            'title' => 'Список категорий',
            'categories' => $categories,
            'pager' => $this->categoryModel->pager,
        ]);
    }


    public function new()
    {
        helper('form');
        return view('admin/category/new', ['title' => 'Новая категория']);
    }

    
    public function create()
    {
       if(!$this->categoryModel->insert($this->request->getPost()))
       {
         session()->setFlashdata('fail', 'Ошибка'  );
         return redirect()->route('admin.category.new')->withInput()
         ->with('errors', $this->categoryModel->errors());

       }
       return redirect()->route('admin.category')
       ->with('success', 'Категория добавлена');

       
    }


}
