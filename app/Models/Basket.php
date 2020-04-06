<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    protected $fillable = [
        'coubt','price','status','user_id','product_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
