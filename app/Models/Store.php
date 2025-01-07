<?php

namespace App\Models;

use App\Enums\StoreType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Store extends Model implements JWTSubject
{
    use HasFactory;

    protected $table = 'store';
    protected $fillable = [
        'dir',
        'gen',
        'sale'
    ];

    protected $casts = [
        'gen' => StoreType::class
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
