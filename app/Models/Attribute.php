<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Attribute extends Model
{
    use SearchableTrait;
    protected $searchable = [
        /**
         *
         * @var array
         */
        'columns' => [
            'attributes.name' => 10,
            'attributes.title' => 10,
        ],
    ];
    protected $fillable = [
        'name','type_id','value','title',
    ];
    public function subcategories()
    {
        return $this->belongsToMany(Subcategory::class,'attribute_subcategories')->withPivot('description','id');
    }
    public function photos()
    {
        return $this->morphMany('App\Models\Photo',"photoable");
    }
}
