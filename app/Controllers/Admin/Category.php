<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\CategoryModel;
use CodeIgniter\Exceptions\PageNotFoundException;

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

    public function edit($id)
    {
      
        helper('form');
        $category = $this->categoryModel->find($id);
        // Проверка есть ли категория
        if(!$category)
        {
            throw PageNotFoundException::forPageNotFound();
        }
        return view('admin/category/edit', [
            'title' => 'Редактированье категории',
            'category' => esc($category),
        ]);

    }

    public function update($id)
    {
        helper('form');
        $category = $this->categoryModel->find($id);
        // Проверка есть ли категория
        if(!$category)
        {
            throw PageNotFoundException::forPageNotFound();
        }

        if (!$this->categoryModel->update($id, $this->request->getPost()))
        {
            session()->setFlashdata('fail', 'Ошибка'  );
            return redirect()->route('admin.category.edit', [$id])->withInput()
            ->with('errors', $this->categoryModel->errors());
        }

        return redirect()->route('admin.category.edit', [$id])
        ->with('success', 'Категория сохранена');
        
      
    }


}
