<?php

namespace App\Services;

use App\Exceptions\BookNotFoundException;
use App\Exceptions\StoreNotFoundException;
use App\Http\Requests\StockRequest;
use App\Models\Stock;
use App\Repositories\BookRepository;
use App\Repositories\StockRepository;
use App\Repositories\StoreRepository;
use Illuminate\Support\Facades\Log;

class BookService{

protected $bookRepository;
protected $stockRepository;
protected $storeRepository;

public function __construct(BookRepository $bookRepository, StockRepository $stockRepository, StoreRepository $storeRepository){

    $this->bookRepository = $bookRepository;
    $this->stockRepository = $stockRepository;
    $this->storeRepository = $storeRepository;
    
}


public function getAllBooks(){

    return $this->bookRepository->getAllBooks();

}

public function getBookByID($id){
    

    $book = $this->bookRepository->getBookByID($id);

    if($book == null){
        throw new BookNotFoundException("Book not found", 404);
    }

    return $book;

}

    public function createBook($data){

        return $this->bookRepository->createBook($data);

    }


    public function getStockByBookID($bookId){

        if($this->bookRepository->getBookByID($bookId) == null){
            throw new BookNotFoundException("Book not found", 404);
        }

        return $this->stockRepository->getStockByBookID($bookId);

    }



    public function deleteBook($id){
        if($this->bookRepository->getBookByID($id) == null){
            throw new BookNotFoundException("Book not found", 404);
        }

        return $this->bookRepository->deleteBook($id);
    }


    public function updateStock(StockRequest $request){



        if($this->bookRepository->getBookByID($request["book_id"]) == null){
            throw new BookNotFoundException("Book not found", 404);
        }

        if(!$this->stockRepository->getStockByBookAndStoreID($request["book_id"], $request["store_id"])){
            throw new StoreNotFoundException("Store not found", 404);
        }

        
        return $this->stockRepository->updateStock($request);
        

    }

    public function updateBook($data){
        return $this->bookRepository->updateBook($data);
    }


}