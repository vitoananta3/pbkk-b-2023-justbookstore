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

    public function detail($slug) {
        $book = $this->booksModel->getBooks($slug);
        $category_id = $book['category_id'];

        $data = [
            'title' => 'Book Detail | JustBookStore',
            'page' => 'book-detail',
            'book' => $book,
            'categories' => $this->categoriesModel->getCategory($category_id)
        ];

        return view('books/detail', $data);
    }

    public function create() {
        $data = [
            'title' => 'Add Book | JustBookStore',
            'page' => 'add-book'
        ];

        return view('books/create', $data);
    }
}
