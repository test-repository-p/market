<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;


class Category extends Model
{
    use SearchableTrait;
    protected $searchable = [
        /**
         *
         * @var array
         */
        'columns' => [
            'categories.name' => 6,
            'categories.title' => 10,
            'categories.id' => 2,

        ],
       
    ];
    protected $fillable = [
        'name','chid','title',
    ];
    public function tags()
    {
        return $this->morphToMany(Tag::class,"taggable");
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }
    public function subcategory()
    {
        return $this->hasMany(Subcategory::class);
    }
    public function article()
    {
        return $this->hasMany(Article::class);
    }

}
