<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stock = new Stock();
        $stock->amount = 10;
        $stock->store_id = 1;
        $stock->book_id = 1;
        $stock->save();



        $stock2 = new Stock();
        $stock2->amount = 3;
        $stock2->store_id = 2;
        $stock2->book_id = 1;
        $stock2->save();

    }
}
