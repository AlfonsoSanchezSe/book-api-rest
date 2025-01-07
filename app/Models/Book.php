<?php

namespace App\Models;

use App\Enums\BookStatus;
use App\Enums\BookType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Book extends Model implements JWTSubject
{

    Use HasFactory;
    
    protected $table = 'book';

    protected $fillable = [
        'isbn',
        'gen',
        'status',
        'price',
        'published'
    ];


    protected $casts = [
        'gen' => BookType::class,
        'status' => BookStatus::class
    ];


    function stock(){
        return $this->hasOne(Stock::class);
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
