<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\BookRequest;
use App\Http\Requests\StockRequest;
use App\Mail\BienvenidaMail;
use App\Services\BookService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Resend;

class BookController extends Controller
{
    public $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function getAllBooks()
    {
        $books = $this->bookService->getAllBooks();

        //El problema estaba en que la carpeta de ApiResponse se llamaba "Helper" y no "Helpers"

        return ApiResponse::success($books, "Books found",200);
        // return response()->json([
        //     'status' => true,
        //     'message' => 'Books found',
        //         'data' => $books
        //    ], 200);
    }


    public function getBookByID($id)
    {
        $book = $this->bookService->getBookByID($id);

        return ApiResponse::success($book, "Book found",200);

        //  return response()->json([
        //           'status' => true,
        //           'message' => 'Book',
        //               'data' => $book
        //          ], 200);
    }

    public function createBook(BookRequest $request){

        $book = $this->bookService->createBook($request->all());

        return ApiResponse::success($book, "Book created",201);
    }

    public function getStockByBookID($bookId){

        $stock = $this->bookService->getStockByBookID($bookId);

        return ApiResponse::success($stock,"Stock found", 200);

    }

    public function deleteBook($id){

        $book = $this->bookService->deleteBook($id);

        return ApiResponse::success($book, "Book deleted", 200);

    }

    public function updateStock(StockRequest $request){
        $stock = $this->bookService->updateStock($request);

        return ApiResponse::success($stock, "Stock updated", 200);
    }


    public function updateBook(BookRequest $request){

        $book = $this->bookService->updateBook($request->all());

        return ApiResponse::success($book, "Book updated", 200);
    }

    public function sendEmail(Request $request){

        $mail = "1902897@alu.murciaeduca.es";
        
        Mail::to($mail)->send(new BienvenidaMail($request->user));

        return ApiResponse::success("","Mail Sended", 200);


    }

}
