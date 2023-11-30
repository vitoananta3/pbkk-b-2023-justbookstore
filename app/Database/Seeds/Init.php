<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class Init extends Seeder
{
    public function run()
    {
        $categories_data = [
            [
                'name' => 'Fiction',
                'slug' => 'fiction',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'name' => 'Non-Fiction',
                'slug' => 'non-fiction',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'name' => 'Science',
                'slug' => 'science',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'name' => 'Technology',
                'slug' => 'technology',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'name' => 'Business',
                'slug' => 'business',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'name' => 'Biography',
                'slug' => 'biography',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'name' => 'History',
                'slug' => 'history',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'name' => 'Health',
                'slug' => 'health',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'name' => 'Travel',
                'slug' => 'travel',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'name' => 'Cooking',
                'slug' => 'cooking',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'name' => 'Art',
                'slug' => 'art',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'name' => 'Religion',
                'slug' => 'religion',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'name' => 'Children',
                'slug' => 'children',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'name' => 'Comics',
                'slug' => 'comics',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'name' => 'Magazines',
                'slug' => 'magazines',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'name' => 'Others',
                'slug' => 'others',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ]
        ];

        $this->db->table('categories')->insertBatch($categories_data);

        $books_data = [
            [
                'title' => 'The Alchemist',
                'slug' => 'the-alchemist',
                'author' => 'Paulo Coelho',
                'publisher' => 'HarperCollins',
                'synopsis' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'price' => 150000,
                'stock' => 5,
                'cover' => 'the-alchemist.jpg',
                'category_id' => 1,
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'title' => 'The Lord of the Rings: The Fellowship of the Ring',
                'slug' => 'the-lord-of-the-rings-the-fellowship-of-the-ring',
                'author' => 'J.R.R. Tolkien',
                'publisher' => 'HarperCollins',
                'synopsis' => 'The Lord of the Rings is an epic high-fantasy novel written by English author and scholar J. R. R. Tolkien. The story began as a sequel to Tolkien\'s 1937 fantasy novel The Hobbit, but eventually developed into a much larger work.',
                'price' => 2000000,
                'stock' => 3,
                'cover' => 'the-lord-of-the-rings-the-fellowship-of-the-ring.jpg',
                'category_id' => 5,
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'title' => 'The Lord of the Rings: The Two Towers',
                'slug' => 'the-lord-of-the-rings-the-two-towers',
                'author' => 'J.R.R. Tolkien',
                'publisher' => 'HarperCollins',
                'synopsis' => 'The Lord of the Rings is an epic high-fantasy novel written by English author and scholar J. R. R. Tolkien. The story began as a sequel to Tolkien\'s 1937 fantasy novel The Hobbit, but eventually developed into a much larger work.',
                'price' => 650000,
                'stock' => 16,
                'cover' => 'the-lord-of-the-rings-the-two-towers.jpg',
                'category_id' => 7,
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'title' => 'The Lord of the Rings: The Return of the King',
                'slug' => 'the-lord-of-the-rings-the-return-of-the-king',
                'author' => 'J.R.R. Tolkien',
                'publisher' => 'HarperCollins',
                'synopsis' => 'The Lord of the Rings is an epic high-fantasy novel written by English author and scholar J. R. R. Tolkien. The story began as a sequel to Tolkien\'s 1937 fantasy novel The Hobbit, but eventually developed into a much larger work.',
                'price' => 90000,
                'stock' => 1,
                'cover' => 'the-lord-of-the-rings-the-return-of-the-king.jpg',
                'category_id' => 3,
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'title' => '1984',
                'slug' => '1984',
                'author' => 'George Orwell',
                'publisher' => 'Secker & Warburg',
                'synopsis' => '1984 is a dystopian novel by George Orwell. It portrays a society under totalitarian rule and explores the dangers of mass surveillance, government overreach, and psychological manipulation.',
                'price' => 180000,
                'stock' => 8,
                'cover' => '1984.jpg',
                'category_id' => 2,
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'title' => 'To Kill a Mockingbird',
                'slug' => 'to-kill-a-mockingbird',
                'author' => 'Harper Lee',
                'publisher' => 'J. B. Lippincott & Co.',
                'synopsis' => 'To Kill a Mockingbird is a novel by Harper Lee. Set in the American South during the 1930s, it addresses issues of racial injustice and moral growth through the eyes of a young girl named Scout Finch.',
                'price' => 220000,
                'stock' => 4,
                'cover' => 'to-kill-a-mockingbird.jpg',
                'category_id' => 4,
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'title' => 'Pride and Prejudice',
                'slug' => 'pride-and-prejudice',
                'author' => 'Jane Austen',
                'publisher' => 'T. Egerton, Whitehall',
                'synopsis' => 'Pride and Prejudice is a romantic novel by Jane Austen. It follows the emotional development of protagonist Elizabeth Bennet, who learns the complexities of love, class, and reputation in the society of the landed gentry in early 19th-century England.',
                'price' => 160000,
                'stock' => 6,
                'cover' => 'pride-and-prejudice.jpg',
                'category_id' => 6,
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'title' => 'The Great Gatsby',
                'slug' => 'the-great-gatsby',
                'author' => 'F. Scott Fitzgerald',
                'publisher' => 'Charles Scribner\'s Sons',
                'synopsis' => 'The Great Gatsby is a novel by F. Scott Fitzgerald. Set in the Jazz Age on Long Island, it explores themes of decadence, idealism, and social upheaval, portraying the story of the enigmatic Jay Gatsby.',
                'price' => 195000,
                'stock' => 10,
                'cover' => 'the-great-gatsby.jpg',
                'category_id' => 8,
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ]
        ];

        $this->db->table('books')->insertBatch($books_data);

        $users_data = [
            [
                'firstName' => 'admin',
                'lastName' => 'JustBookStore',
                'email' => 'admin@gmail.com',
                'password' => 'admin21',
                'isAdmin' => '1',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'firstName' => 'Vito',
                'lastName' => 'Ananta',
                'email' => 'vito1234@gmail.com',
                'password' => 'vito1234',
                'isAdmin' => '0',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'firstName' => 'Travis',
                'lastName' => 'Barker',
                'email' => 'travis182@blink.com',
                'password' => 'travis182',
                'isAdmin' => '0',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
        ];

        $this->db->table('users')->insertBatch($users_data);
    }
}
