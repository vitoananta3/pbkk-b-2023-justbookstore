<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BooksModel;

class Books extends BaseController
{
    protected $booksModel;

    public function __construct()
    {
        $this->booksModel = new BooksModel();
    }

    public function index()
    {
        // $data = [
        //     'title' => 'Books | JustBookStore',
        //     'page' => 'books',
            // 'books' => [
            //     'book-1' => [
            //         'id' => '1',
            //         'title' => 'Harry Potter and the Philosopher\'s Stone',
            //         'slug' => 'harry-potter-and-the-philosopher-stone',
            //         'author' => 'J.K. Rowling',
            //         'publisher' => 'Bloomsbury',
            //         'synopsis' => 'Harry Potter lives with his abusive uncle and aunt, Vernon and Petunia Dursley, and their bullying son, Dudley. On Harrys eleventh birthday, Rubeus Hagrid, a half-giant, delivers an acceptance letter from Hogwarts School of Witchcraft and Wizardry, revea
            //         ',
            //         'cover' => 'cover-1.jpg',
            //         'price' => 'Rp333.000',
            //         'stock' => '10',
            //     ],
            //     'book-2' => [
            //         'id' => '2',
            //         'title' => 'Harry Potter and the Philosopher\'s Stone',
            //         'slug' => 'harry-potter-and-the-philosopher-stone',
            //         'author' => 'J.K. Rowling',
            //         'publisher' => 'Bloomsbury',
            //         'synopsis' => 'Harry Potter lives with his abusive uncle and aunt, Vernon and Petunia Dursley, and their bullying son, Dudley. On Harrys eleventh birthday, Rubeus Hagrid, a half-giant, delivers an acceptance letter from Hogwarts School of Witchcraft and Wizardry, revea
            //         ',
            //         'cover' => 'cover-2.jpg',
            //         'price' => 'Rp333.000',
            //         'stock' => '10',
            //     ],
            //     'book-3' => [
            //         'id' => '3',
            //         'title' => 'Harry Potter and the Philosopher\'s Stone',
            //         'slug' => 'harry-potter-and-the-philosopher-stone',
            //         'author' => 'J.K. Rowling',
            //         'publisher' => 'Bloomsbury',
            //         'synopsis' => 'Harry Potter lives with his abusive uncle and aunt, Vernon and Petunia Dursley, and their bullying son, Dudley. On Harrys eleventh birthday, Rubeus Hagrid, a half-giant, delivers an acceptance letter from Hogwarts School of Witchcraft and Wizardry, revea
            //         ',
            //         'cover' => 'cover-2.jpg',
            //         'price' => 'Rp333.000',
            //         'stock' => '10',
            //     ],
            //     'book-4' => [
            //         'id' => '4',
            //         'title' => 'Harry Potter and the Philosopher\'s Stone',
            //         'slug' => 'harry-potter-and-the-philosopher-stone',
            //         'author' => 'J.K. Rowling',
            //         'publisher' => 'Bloomsbury',
            //         'synopsis' => 'Harry Potter lives with his abusive uncle and aunt, Vernon and Petunia Dursley, and their bullying son, Dudley. On Harrys eleventh birthday, Rubeus Hagrid, a half-giant, delivers an acceptance letter from Hogwarts School of Witchcraft and Wizardry, revea
            //         ',
            //         'cover' => 'cover-1.jpg',
            //         'price' => 'Rp333.000',
            //         'stock' => '10',
            //     ],
            //     'book-5' => [
            //         'id' => '5',
            //         'title' => 'Harry Potter and the Philosopher\'s Stone',
            //         'slug' => 'harry-potter-and-the-philosopher-stone',
            //         'author' => 'J.K. Rowling',
            //         'publisher' => 'Bloomsbury',
            //         'synopsis' => 'Harry Potter lives with his abusive uncle and aunt, Vernon and Petunia Dursley, and their bullying son, Dudley. On Harrys eleventh birthday, Rubeus Hagrid, a half-giant, delivers an acceptance letter from Hogwarts School of Witchcraft and Wizardry, revea
            //         ',
            //         'cover' => 'cover-2.jpg',
            //         'price' => 'Rp333.000',
            //         'stock' => '10',
            //     ],
            //     'book-6' => [
            //         'id' => '6',
            //         'title' => 'Harry Potter and the Philosopher\'s Stone',
            //         'slug' => 'harry-potter-and-the-philosopher-stone',
            //         'author' => 'J.K. Rowling',
            //         'publisher' => 'Bloomsbury',
            //         'synopsis' => 'Harry Potter lives with his abusive uncle and aunt, Vernon and Petunia Dursley, and their bullying son, Dudley. On Harrys eleventh birthday, Rubeus Hagrid, a half-giant, delivers an acceptance letter from Hogwarts School of Witchcraft and Wizardry, revea
            //         ',
            //         'cover' => 'cover-1.jpg',
            //         'price' => 'Rp333.000',
            //         'stock' => '10',
            //     ],
            //     'book-7' => [
            //         'id' => '7',
            //         'title' => 'Harry Potter and the Philosopher\'s Stone',
            //         'slug' => 'harry-potter-and-the-philosopher-stone',
            //         'author' => 'J.K. Rowling',
            //         'publisher' => 'Bloomsbury',
            //         'synopsis' => 'Harry Potter lives with his abusive uncle and aunt, Vernon and Petunia Dursley, and their bullying son, Dudley. On Harrys eleventh birthday, Rubeus Hagrid, a half-giant, delivers an acceptance letter from Hogwarts School of Witchcraft and Wizardry, revea
            //         ',
            //         'cover' => 'cover-2.jpg',
            //         'price' => 'Rp333.000',
            //         'stock' => '10',
            //     ],
            //     'book-8' => [
            //         'id' => '8',
            //         'title' => 'Harry Potter and the Philosopher\'s Stone',
            //         'slug' => 'harry-potter-and-the-philosopher-stone',
            //         'author' => 'J.K. Rowling',
            //         'publisher' => 'Bloomsbury',
            //         'synopsis' => 'Harry Potter lives with his abusive uncle and aunt, Vernon and Petunia Dursley, and their bullying son, Dudley. On Harrys eleventh birthday, Rubeus Hagrid, a half-giant, delivers an acceptance letter from Hogwarts School of Witchcraft and Wizardry, revea
            //         ',
            //         'cover' => 'cover-1.jpg',
            //         'price' => 'Rp333.000',
            //         'stock' => '10',
            //     ],
            //     'book-9' => [
            //         'id' => '9',
            //         'title' => 'Harry Potter and the Philosopher\'s Stone',
            //         'slug' => 'harry-potter-and-the-philosopher-stone',
            //         'author' => 'J.K. Rowling',
            //         'publisher' => 'Bloomsbury',
            //         'synopsis' => 'Harry Potter lives with his abusive uncle and aunt, Vernon and Petunia Dursley, and their bullying son, Dudley. On Harry\'s eleventh birthday, Rubeus Hagrid, a half-giant, delivers an acceptance letter from Hogwarts School of Witchcraft and Wizardry, reve
            //         ',
            //         'cover' => 'cover-1.jpg',
            //         'price' => 'Rp333.000',
            //         'stock' => '10',
            //     ],
            //     'book-10' => [
            //         'id' => '10',
            //         'title' => 'Harry Potter and the Philosopher\'s Stone',
            //         'slug' => 'harry-potter-and-the-philosopher-stone',
            //         'author' => 'J.K. Rowling',
            //         'publisher' => 'Bloomsbury',
            //         'synopsis' => '
            //         Harry Potter lives with his abusive uncle and aunt, Vernon and Petunia Dursley, and their bullying son, Dudley. On Harry\'s eleventh birthday, Rubeus Hagrid, a half-giant, delivers an acceptance letter from Hogwarts School of Witchcraft and Wizardry, reve
            //         ',
            //         'cover' => 'cover-2.jpg',
            //         'price' => 'Rp333.000',
            //         'stock' => '10',
            //     ],
            //     'book-11' => [
            //         'id' => '11',
            //         'title' => 'Harry Potter and the Philosopher\'s Stone',
            //         'slug' => 'harry-potter-and-the-philosopher-stone',
            //         'author' => 'J.K. Rowling',
            //         'publisher' => 'Bloomsbury',
            //         'synopsis' =>
            //         'Harry Potter lives with his abusive uncle and aunt, Vernon and Petunia Dursley, and their bullying son, Dudley. On Harry\'s eleventh birthday, Rubeus Hagrid, a half-giant, delivers an acceptance letter from Hogwarts School of Witchcraft and Wizardry, reve
            //         ',
            //         'cover' => 'cover-1.jpg',
            //         'price' => 'Rp333.000',
            //         'stock' => '10',
            //     ],
            //     'book-12' => [
            //         'id' => '12',
            //         'title' => 'Harry Potter and the Philosopher\'s Stone',
            //         'slug' => 'harry-potter-and-the-philosopher-stone',
            //         'author' => 'J.K Rowling',
            //         'publisher' => 'Bloomsbury',
            //         'synopsis' =>
            //         'Harry Potter lives with his abusive uncle and aunt, Vernon and Petunia Dursley, and their bullying son, Dudley. On Harry\'s eleventh birthday, Rubeus Hagrid, a half-giant, delivers an acceptance letter from Hogwarts School of Witchcraft and Wizardry, reve
            //         ',
            //         'cover' => 'cover-2.jpg',
            //         'price' => 'Rp333.000',
            //         'stock' => '10',
            //     ],
            //     'book-13' => [
            //         'id' => '13',
            //         'title' => 'Harry Potter and the Philosopher\'s Stone',
            //         'slug' => 'harry-potter-and-the-philosopher-stone',
            //         'author' => 'J.K Rowling',
            //         'publisher' => 'Bloomsbury',
            //         'synopsis' =>
            //         'Harry Potter lives with his abusive uncle and aunt, Vernon and Petunia Dursley, and their bullying son, Dudley. On Harry\'s eleventh birthday, Rubeus Hagrid, a half-giant, delivers an acceptance letter from Hogwarts School of Witchcraft and Wizardry, reve
            //         ',
            //         'cover' => 'cover-1.jpg',
            //         'price' => 'Rp333.000',
            //         'stock' => '10',
            //     ],
            //     'book-14' => [
            //         'id' => '14',
            //         'title' => 'Harry Potter and the Philosopher\'s Stone',
            //         'slug' => 'harry-potter-and-the-philosopher-stone',
            //         'author' => 'J.K Rowling',
            //         'publisher' => 'Bloomsbury',
            //         'synopsis' =>
            //         'Harry Potter lives with his abusive uncle and aunt, Vernon and Petunia Dursley, and their bullying son, Dudley. On Harry\'s eleventh birthday, Rubeus Hagrid, a half-giant, delivers an acceptance letter from Hogwarts School of Witchcraft and Wizardry, reve
            //         ',
            //         'cover' => 'cover-2.jpg',
            //         'price' => 'Rp333.000',
            //         'stock' => '10',
            //     ],
            // ]
        // ];

        // $books = $this->booksModel->findAll();
        // dd($books);You must set the database table to be used with your query

        $data = [
            'title' => 'Books | JustBookStore',
            'page' => 'books',
            'books' => $this->booksModel->getBooks()
        ];

        // $db = \Config\Database::connect();
        // $books = $db->query("SELECT * FROM books");
        // dd($books->getResultArray());

        return view('books/index', $data);
    }

    public function detail($slug) {
        $book = $this->booksModel->getBooks($slug);
        // dd($book);

        $data = [
            'title' => 'Book Detail | JustBookStore',
            'page' => 'book-detail',
            'book' => $book
        ];

        return view('books/detail', $data);
    }
}
