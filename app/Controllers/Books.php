<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BooksModel;
use App\Models\CategoryModel;

class Books extends BaseController
{
    protected $booksModel;
    protected $categoriesModel;

    public function __construct()
    {
        $this->booksModel = new BooksModel();
        $this->categoriesModel = new CategoryModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Books | JustBookStore',
            'page' => 'books',
            'books' => $this->booksModel->getBooks()
        ];

        return view('books/index', $data);
    }

    public function detail($slug)
    {
        $book = $this->booksModel->getBooks($slug);
        $category_id = $book['category_id'];

        $data = [
            'title' => 'Book Detail | JustBookStore',
            'page' => 'books',
            'book' => $book,
            'categories' => $this->categoriesModel->getCategoryById($category_id)
        ];

        return view('books/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add Book | JustBookStore',
            'page' => 'books',
            'validation' => session('data') ? session('data')['validation'] : \Config\Services::validation(),
            'categories' => $this->categoriesModel->getCategories()
        ];

        return view('books/create', $data);
    }

    public function save()
    {
        $categoryIds = $this->categoriesModel->getCategoryIds();

        $validation = \Config\Services::validation();

        $rules = [
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Title is required.',
                ]
            ],
            'author' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Author is required.',
                ]
            ],
            'publisher' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Publisher is required.',
                ]
            ],
            'synopsis' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Synopsis is required.',
                    'max_length' => 'Synopsis is too long. (max 255 characters)'
                ]
            ],
            'category_id' => [
                'rules' => 'required|in_list[' . implode(',', $categoryIds) . ']',
                'errors' => [
                    'required' => 'Category id is required.',
                    'in_list' => 'Category should be choosed.'
                ]
            ],
            'price' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Price is required.',
                    'numeric' => 'Price must be a number.'
                ]
            ],
            'stock' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Stock is required.',
                    'numeric' => 'Stock must be a number.'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            $data = [
                'title' => 'Add Book | JustBookStore',
                'page' => 'books',
                'validation' => $validation
            ];
            return redirect()->to('/books/create')->withInput()->with('data', $data);
        }

        $this->booksModel->save([
            'title' => $this->request->getVar('title'),
            'slug' => url_title($this->request->getVar('title'), '-', true),
            'author' => $this->request->getVar('author'),
            'publisher' => $this->request->getVar('publisher'),
            'synopsis' => $this->request->getVar('synopsis'),
            'category_id' => $this->request->getVar('category_id'),
            'price' => $this->request->getVar('price'),
            'stock' => $this->request->getVar('stock'),
            'cover' => $this->request->getVar('cover')  
        ]);

        session()->setFlashdata('message', 'New Book has been added.');
        return redirect()->to('/books');
    }
}
