<?php

namespace Database\Seeders;

use App\Enums\StoreType;
use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $store = new Store();

        $store->dir = "Calle Ejemplo 123";
        $store->gen = StoreType::STORE;
        $store->sale = true;
        $store->save();


        $store2 = new Store();

        $store2->dir = "Calle Real 33";
        $store2->gen = StoreType::OTHER;
        $store2->sale = false;
        $store2->save();
    }
}
