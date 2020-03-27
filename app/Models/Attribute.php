<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = [
        'name','type_id','value',
    ];
    public function subcategories()
    {
        return $this->belongsToMany(Subcategory::class);
    }
    public function photos()
    {
        return $this->morphMany('App\Models\Photo',"photoable");
    }
}
