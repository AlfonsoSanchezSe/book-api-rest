<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Stock extends Model implements JWTSubject
{
    protected $table = 'stock';

    protected $fillable = [
        'amount',
        'book',
        'store',
    ];


    function book(){
        return $this->belongsTo(Book::class);
    }

    function store(){
        return $this->belongsTo(Store::class);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

}
