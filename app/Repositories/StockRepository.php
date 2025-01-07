<?php


namespace App\Repositories;

use App\Http\Requests\StockRequest;
use App\Models\Book;
use App\Models\Stock;
use Illuminate\Support\Facades\Log;

class StockRepository{

    public function getStockByBookID($bookId){

        return Stock::where("book_id", $bookId)->with("book", "store")->get();
    }

    public function getStockByBookAndStoreID($bookId, $storeId){
        return Stock::where("book_id", $bookId)->where("store_id", $storeId)->get();
    }

    public function updateStock(StockRequest $request){

        Log::info($request);

        return Stock::where("store_id", $request["store_id"])->where("book_id", $request["book_id"])->update(["amount" => $request["amount"]]);

    }

}