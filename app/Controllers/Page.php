<?php

namespace App\Controllers;

class Page extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Home | JustBookStore',
            'page' => 'home'
        ];
        return view('home', $data);
    }

    // public function books(): string
    // {
        // $data = [
        //     'title' => 'Books | JustBookStore',
        //     'page' => 'books',
        //     'books' => [
        //         'book-1' => [
        //             'id' => '1',
        //             'title' => 'Harry Potter and the Philosopher\'s Stone',
        //             'author' => 'J. K. Rowling',
        //             'price' => 'Rp150.000',
        //         ],
        //         'book-2' => [
        //             'id' => '2',
        //             'title' => 'Harry Potter and the Chamber of Secrets',
        //             'author' => 'J. K. Rowling',
        //             'price' => 'Rp150.000',
        //         ],
        //         'book-3' => [
        //             'id' => '3',
        //             'title' => 'Harry Potter and the Prisoner of Azkaban',
        //             'author' => 'J. K. Rowling',
        //             'price' => 'Rp150.000',
        //         ],
        //         'book-4' => [
        //             'id' => '4',
        //             'title' => 'Harry Potter and the Goblet of Fire',
        //             'author' => 'J. K. Rowling',
        //             'price' => 'Rp150.000',
        //         ],
        //         'book-5' => [
        //             'id' => '5',
        //             'title' => 'Harry Potter and the Order of the Phoenix',
        //             'author' => 'J. K. Rowling',
        //             'price' => 'Rp150.000',
        //         ],
        //         'book-6' => [
        //             'id' => '6',
        //             'title' => 'Harry Potter and the Half-Blood Prince',
        //             'author' => 'J. K. Rowling',
        //             'price' => 'Rp150.000',
        //         ],
        //         'book-7' => [
        //             'id' => '7',
        //             'title' => 'Harry Potter and the Deathly Hallows',
        //             'author' => 'J. K. Rowling',
        //             'price' => 'Rp150.000',
        //         ],
        //         'book-8' => [
        //             'id' => '8',
        //             'title' => 'Harry Potter and the Philosopher\'s Stone',
        //             'author' => 'J. K. Rowling',
        //             'price' => 'Rp150.000',
        //         ],
        //         'book-9' => [
        //             'id' => '9',
        //             'title' => 'Harry Potter and the Chamber of Secrets',
        //             'author' => 'J. K. Rowling',
        //             'price' => 'Rp150.000',
        //         ],
        //         'book-10' => [
        //             'id' => '10',
        //             'title' => 'Harry Potter and the Prisoner of Azkaban',
        //             'author' => 'J. K. Rowling',
        //             'price' => 'Rp150.000',
        //         ],
        //         'book-11' => [
        //             'id' => '11',
        //             'title' => 'Harry Potter and the Goblet of Fire',
        //             'author' => 'J. K. Rowling',
        //             'price' => 'Rp150.000',
        //         ],
        //         'book-12' => [
        //             'id' => '12',
        //             'title' => 'Harry Potter and the Order of the Phoenix',
        //             'author' => 'J. K. Rowling',
        //             'price' => 'Rp150.000',
        //         ],
        //         'book-13' => [
        //             'id' => '13',
        //             'title' => 'Harry Potter and the Half-Blood Prince',
        //             'author' => 'J. K. Rowling',
        //             'price' => 'Rp150.000',
        //         ],
        //         'book-14' => [
        //             'id' => '14',
        //             'title' => 'Harry Potter and the Deathly Hallows',
        //             'author' => 'J. K. Rowling',
        //             'price' => 'Rp150.000',
        //         ],
        //         'book-15' => [
        //             'id' => '15',
        //             'title' => 'Harry Potter and the Philosopher\'s Stone',
        //             'author' => 'J. K. Rowling',
        //             'price' => 'Rp150.000',
        //         ],
        //         'book-16' => [
        //             'id' => '16',
        //             'title' => 'Harry Potter and the Chamber of Secrets',
        //             'author' => 'J. K. Rowling',
        //             'price' => 'Rp150.000',
        //         ],
        //         'book-17' => [
        //             'id' => '17',
        //             'title' => 'Harry Potter and the Prisoner of Azkaban',
        //             'author' => 'J. K. Rowling',
        //             'price' => 'Rp150.000',
        //         ],
        //         'book-18' => [
        //             'id' => '18',
        //             'title' => 'Harry Potter and the Goblet of Fire',
        //             'author' => 'J. K. Rowling',
        //             'price' => 'Rp150.000',
        //         ],
        //         'book-19' => [
        //             'id' => '19',
        //             'title' => 'Harry Potter and the Order of the Phoenix',
        //             'author' => 'J. K. Rowling',
        //             'price' => 'Rp150.000',
        //         ],
        //         'book-20' => [
        //             'id' => '20',
        //             'title' => 'Harry Potter and the Half-Blood Prince',
        //             'author' => 'J. K. Rowling',
        //             'price' => 'Rp150.000',
        //         ],
        //         'book-21' => [
        //             'id' => '21',
        //             'title' => 'Harry Potter and the Deathly Hallows',
        //             'author' => 'J. K. Rowling',
        //             'price' => 'Rp150.000',
        //         ],
        //         'book-22' => [
        //             'id' => '22',
        //             'title' => 'Harry Potter and the Philosopher\'s Stone',
        //             'author' => 'J. K. Rowling',
        //             'price' => 'Rp150.000',
        //         ],
        //         'book-23' => [
        //             'id' => '23',
        //             'title' => 'Harry Potter and the Chamber of Secrets',
        //             'author' => 'J. K. Rowling',
        //             'price' => 'Rp150.000',
        //         ],
        //         'book-24' => [
        //             'id' => '24',
        //             'title' => 'Harry Potter and the Prisoner of Azkaban',
        //             'author' => 'J. K. Rowling',
        //             'price' => 'Rp150.000',
        //         ],
        //         'book-25' => [
        //             'id' => '25',
        //             'title' => 'Harry Potter and the Goblet of Fire',
        //             'author' => 'J. K. Rowling',
        //             'price' => 'Rp150.000',
        //         ],
        //         'book-26' => [
        //             'id' => '26',
        //             'title' => 'Harry Potter and the Order of the Phoenix',
        //             'author' => 'J. K. Rowling',
        //             'price' => 'Rp150.000',
        //         ],
        //         'book-27' => [
        //             'id' => '27',
        //             'title' => 'Harry Potter and the Half-Blood Prince',
        //             'author' => 'J. K. Rowling',
        //             'price' => 'Rp150.000',
        //         ],
        //         'book-28' => [
        //             'id' => '28',
        //             'title' => 'Harry Potter and the Deathly Hallows',
        //             'author' => 'J. K. Rowling',
        //             'price' => 'Rp150.000',
        //         ],
        //     ]
        // ];
        // return view('books/index', $data);
    // }
}
