<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;


class Tag extends Model
{
    use SearchableTrait;
    protected $searchable = [
        /**
         *
         * @var array
         */
        'columns' => [
            'tags.id' => 10,
            'tags.name' => 10,

        ],
       
    ];
    protected $fillable = [
        'name',
    ];
    public function products()
    {
        return $this->morphedByMany(Product::class,"taggable");
    }
    public function categories()
    {
        return $this->morphedByMany(Category::class,"taggable");
    }
    public function articles()
    {
        return $this->morphedByMany(Article::class,"taggable");
    }
}
