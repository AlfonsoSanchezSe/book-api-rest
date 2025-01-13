<?php

namespace App\Repositories;

use App\Enums\BookStatus;
use App\Models\Book;

class BookRepository
{
    
    public function getAllBooks(){

        return Book::all();
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


    public function updateBook($data){
        Book::find($data["id"])->update(["isbn" => $data["isbn"], "gen" => $data["gen"], "status" => $data["status"], "price" => $data["price"], "published" => $data["published"]]);
        return $this->getBookByID($data["id"]);
    
    }


}