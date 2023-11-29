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

    public function detail($id)
    {
        $book = $this->booksModel->getBookById($id);
        $category_id = $book['category_id'];

        $data = [
            'title' => 'Book Detail | JustBookStore',
            'page' => 'books',
            'book' => $book,
            'category' => $this->categoriesModel->getCategoryById($category_id)
        ];

        if (empty($data['book'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Book ' . $id . ' not found.');
        }

        return view('books/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add Book | JustBookStore',
            'page' => 'books',
            'validation' => session('validation_errors'),
            'categories' => $this->categoriesModel->getCategories()
        ];
        // if (session('validation_errors') && array_key_exists('title', session('validation_errors'))) {
        //     dd($data['validation']);
        // }
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
            ],
            'cover' => [
                'rules' => 'max_size[cover,1024]|is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]|max_dims[cover,510,784]',
                'errors' => [
                    'max_size' => 'Cover file size is too big. (max 1MB)',
                    'is_image' => 'Cover is not an image.',
                    'mime_in' => 'Cover is not an image.',
                    'max_dims' => 'Cover dimension is too big. (max 510x784)'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('validation_errors', $validation->getErrors());
            return redirect()->to('/books/create')->withInput();
        }

        $coverFile = $this->request->getFile('cover');
        // dd($coverFile);

        if ($coverFile->getError() == 4) {
            $coverFileName = 'no-cover.jpg';
        } else {
            $editedCoverFile = \Config\Services::image();
            $coverFile->move('assets/books-cover');

            $imageSize = getimagesize('assets/books-cover/' . $coverFile->getName());
            $width = $imageSize[0]; // Get width
            $height = $imageSize[1]; // Get height

            if (($width > 255 || $width < 255) || ($height > 392 || $height < 392)) {
                // Resize and fit the image to 255x392
                $editedCoverFile->withFile('assets/books-cover/' . $coverFile->getName())
                    ->fit(255, 392, 'center')
                    ->save('assets/books-cover/' . $coverFile->getName());
                $coverFileName = $coverFile->getName();
            } else {
                // If image is within the desired dimensions, use the original file
                $coverFileName = $coverFile->getName();
            }
        }

        // $noCover = 'no-cover.jpg';
        // if ($this->request->getVar('cover') == '') {
        //     $cover = $noCover;
        // } else {
        //     $cover = $this->request->getVar('cover');
        // }

        $this->booksModel->save([
            'title' => $this->request->getVar('title'),
            'slug' => url_title($this->request->getVar('title'), '-', true),
            'author' => $this->request->getVar('author'),
            'publisher' => $this->request->getVar('publisher'),
            'synopsis' => $this->request->getVar('synopsis'),
            'category_id' => $this->request->getVar('category_id'),
            'price' => $this->request->getVar('price'),
            'stock' => $this->request->getVar('stock'),
            'cover' => $coverFileName
        ]);

        session()->setFlashdata('message', 'New Book has been added.');
        return redirect()->to('/books');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Edit Book | JustBookStore',
            'page' => 'books',
            'validation' => session('validation_errors'),
            'book' => $this->booksModel->getBookBySlug($slug),
            'categories' => $this->categoriesModel->getCategories(),
        ];

        return view('books/edit', $data);
    }

    public function update($id)
    {
        // dd($this->request->getVar());
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
            ],
            'cover' => [
                'rules' => 'max_size[cover,1024]|is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]|max_dims[cover,510,784]',
                'errors' => [
                    'max_size' => 'Cover file size is too big. (max 1MB)',
                    'is_image' => 'Cover is not an image.',
                    'mime_in' => 'Cover is not an image.',
                    'max_dims' => 'Cover dimension is too big. (max 510x784)'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('validation_errors', $validation->getErrors());
            return redirect()->to('/books/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $coverFile = $this->request->getFile('cover');

        if ($coverFile->getError() == 4) {
            $coverFile = $this->request->getVar('oldCover');
        } else {
            $coverFile->move('assets/books-cover');
            $coverFile = $coverFile->getName();
            if ($this->request->getVar('oldCover') != 'no-cover.jpg') {
                unlink('assets/books-cover/' . $this->request->getVar('oldCover'));
            }
        }

        $this->booksModel->save([
            'id' => $id,
            'title' => $this->request->getVar('title'),
            'slug' => url_title($this->request->getVar('title'), '-', true),
            'author' => $this->request->getVar('author'),
            'publisher' => $this->request->getVar('publisher'),
            'synopsis' => $this->request->getVar('synopsis'),
            'category_id' => $this->request->getVar('category_id'),
            'price' => $this->request->getVar('price'),
            'stock' => $this->request->getVar('stock'),
            'cover' => $coverFile
        ]);

        session()->setFlashdata('message', 'Book has been edited.');
        return redirect()->to('/books');
    }

    public function delete($id)
    {

        if ($this->booksModel->getBookById($id)['cover'] != 'no-cover.jpg') {
            unlink('assets/books-cover/' . $this->booksModel->getBookById($id)['cover']);
        }

        $this->booksModel->delete($id);
        session()->setFlashdata('message', 'Book has been deleted.');
        return redirect()->to('/books');
    }
}
