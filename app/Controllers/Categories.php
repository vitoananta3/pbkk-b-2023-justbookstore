<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;

class Categories extends BaseController
{
    protected $categoriesModel;

    public function __construct()
    {
        $this->categoriesModel = new CategoryModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Categories | JustBookStore',
            'page' => 'categories',
            'categories' => $this->categoriesModel->getCategories()
        ];
        
        return view('categories/index', $data);
    }

    public function detail($slug)
    {
        $user = session()->get('user');
        if (!$user) {
            return redirect()->to('/signin');
        }

        $data = [
            'title' => 'Category Detail | JustBookStore',
            'page' => 'categories',
            'category' => $this->categoriesModel->getCategory($slug),
        ];


        if (empty($data['category'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Category ' . $slug . ' not found.');
        }

        // dd($data['category']);
        return view('categories/detail', $data);
    }

    public function create()
    {
        $user = session()->get('user');
        if (!$user || $user['isAdmin'] != '1') {
            return redirect()->to('/signin');
        }

        $data = [
            'title' => 'Add Category | JustBookStore',
            'page' => 'categories',
            'validation' => session('data') ? session('data')['validation'] : \Config\Services::validation()
        ];
        return view('categories/create', $data);
    }

    public function save()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'name' => [
                'rules' => 'required|is_unique[categories.name]|max_length[32]',
                'errors' => [
                    'required' => 'Name is required.',
                    'is_unique' => 'Name already exists.',
                    'max_length' => 'Name is too long (max 32 characters).'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            $data = [
                'title' => 'Add Category | JustBookStore',
                'page' => 'categories',
                'validation' => $validation
            ];
            return redirect()->to('/categories/create')->withInput()->with('data', $data);
        }

        $this->categoriesModel->save([
            'name' => $this->request->getVar('name'),
            'slug' => url_title($this->request->getVar('name'), '-', true)
        ]);

        session()->setFlashdata('message', 'New category has been added.');
        return redirect()->to('/categories');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Edit Category | JustBookStore',
            'page' => 'categories',
            'validation' => session('data') ? session('data')['validation'] : \Config\Services::validation(),
            'category' => $this->categoriesModel->getCategory($slug)
        ];

        return view('categories/edit', $data);
    }

    public function update($id) {
        $validation = \Config\Services::validation();

        $rules = [
            'name' => [
                'rules' => 'required|is_unique[categories.name]|max_length[32]',
                'errors' => [
                    'required' => 'Name is required.',
                    'is_unique' => 'Name already exists.',
                    'max_length' => 'Name is too long (max 32 characters).'
                ]
            ]
        ];

        // name checking
        // $oldCategory = $this->categoriesModel->getCategory($this->request->getVar('slug'));
        // if ($oldCategory['name'] == $this->request->getVar('name')) {
        //     unset($rules['name']['rules'][1]);
        // }

        if (!$this->validate($rules)) {
            $data = [
                'title' => 'Update Category | JustBookStore',
                'page' => 'categories',
                'validation' => $validation
            ];
            return redirect()->to('/categories/edit/'. $this->request->getVar('slug'))->withInput()->with('data', $data);
        }

        $this->categoriesModel->save([
            'id' => $id,
            'name' => $this->request->getVar('name'),
            'slug' => url_title($this->request->getVar('name'), '-', true)
        ]);

        session()->setFlashdata('message', 'Category has been edited.');
        return redirect()->to('/categories');
    }

    public function delete($id)
    {
        $this->categoriesModel->delete($id);
        session()->setFlashdata('message', 'Category has been deleted.');
        return redirect()->to('/categories');
    }
}
