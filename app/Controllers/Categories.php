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

        // $data = [
        //     'title' => 'Categories | JustBookStore',
        //     'page' => 'categories',
        //     'categories' => [
        //         'category1' => [
        //             'id' => 1,
        //             'name' => 'Fantasy'
        //         ],
        //         'category2' => [
        //             'id' => 2,
        //             'name' => 'Horror'
        //         ],
        //         'category3' => [
        //             'id' => 3,
        //             'name' => 'Romance'
        //         ],
        //         'category4' => [
        //             'id' => 4,
        //             'name' => 'Sci-Fi'
        //         ],
        //         'category5' => [
        //             'id' => 5,
        //             'name' => 'Thriller'
        //         ],
        //         'category6' => [
        //             'id' => 6,
        //             'name' => 'Mystery'
        //         ],
        //         'category7' => [
        //             'id' => 7,
        //             'name' => 'Western'
        //         ],
        //         'category8' => [
        //             'id' => 8,
        //             'name' => 'Dystopian'
        //         ],
        //         'category9' => [
        //             'id' => 9,
        //             'name' => 'Contemporary'
        //         ],
        //         'category10' => [
        //             'id' => 10,
        //             'name' => 'Historical Fiction'
        //         ],
        //         'category11' => [
        //             'id' => 11,
        //             'name' => 'Memoir'
        //         ],
        //         'category12' => [
        //             'id' => 12,
        //             'name' => 'Cooking'
        //         ],
        //         'category13' => [
        //             'id' => 13,
        //             'name' => 'Art'
        //         ],
        //         'category14' => [
        //             'id' => 14,
        //             'name' => 'Self-Help'
        //         ],
        //         'category15' => [
        //             'id' => 15,
        //             'name' => 'Development'
        //         ],
        //         'category16' => [
        //             'id' => 16,
        //             'name' => 'Motivational'
        //         ],
        //         'category17' => [
        //             'id' => 17,
        //             'name' => 'Health'
        //         ],
        //         'category18' => [
        //             'id' => 18,
        //             'name' => 'History'
        //         ],
        //         'category19' => [
        //             'id' => 19,
        //             'name' => 'Travel'
        //         ],
        //         'category20' => [
        //             'id' => 20,
        //             'name' => 'Guide / How To'
        //         ],
        //         'category21' => [
        //             'id' => 21,
        //             'name' => 'Families & Relationships'
        //         ],
        //         'category22' => [
        //             'id' => 22,
        //             'name' => 'Humor'
        //         ],
        //         'category23' => [
        //             'id' => 23,
        //             'name' => 'Children’s'
        //         ],
        //         'category24' => [
        //             'id' => 24,
        //             'name' => 'Other'
        //         ],
        //     ]
        // ];
        return view('categories/index', $data);
    }

    public function detail($slug)
    {
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

    public function delete($id)
    {
        $this->categoriesModel->delete($id);
        session()->setFlashdata('message', 'Category has been deleted.');
        return redirect()->to('/categories');
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
                'title' => 'Add Category | JustBookStore',
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
}
