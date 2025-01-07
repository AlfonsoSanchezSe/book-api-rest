<?php

namespace Database\Seeders;

use App\Enums\BookStatus;
use App\Enums\BookType;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $book = new Book();

        $book->isbn = "978-3-16-148410-0";
        $book->gen = BookType::DRAMA;
        $book->status = BookStatus::ONSALE;
        $book->price = 9.99;
        $book->published = "2023-01-01";
        $book->save();

        $book2 = new Book();

        $book2->isbn = "938-5-76-1534510-1";
        $book2->gen = BookType::COOKING;
        $book2->status = BookStatus::PREORDER;
        $book2->price = 10.50;
        $book2->published = "2024-03-05";
        $book2->save();
    }
}
