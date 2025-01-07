<?php


namespace App\Repositories;

use App\Models\Store;

class StoreRepository{


    public function getStoreById($id){
        return Store::find($id)->exists();
    }

}