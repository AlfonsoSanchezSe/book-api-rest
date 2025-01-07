<?php

namespace App\Repositories;

use App\Enums\BookStatus;
use App\Models\Book;

class BookRepository
{
    
    public function getAllBooks(){

        return Book::where('status', BookStatus::ONSALE)->get();
    }

    public function getBookByID($id){
        return Book::find($id);
    }


    public function createBook($data){
        return Book::create($data);
    }


    public function deleteBook($id){

        return Book::destroy($id);
    }


}