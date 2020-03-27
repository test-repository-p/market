<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'title','path','photoable_id','photoable_type'
    ];
    public function Photoable()
    {
        return $this->morphTo();
    }
}
