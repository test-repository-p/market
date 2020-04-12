<?php

namespace App\Models;

use willvincent\Rateable\Rateable;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model
{
    use SearchableTrait;
    use Rateable;
    protected $fillable = [
        'user_id','category_id','name','price','status','discount','count','countsale','special',
    ];
    protected $searchable = [
        /**
         *
         * @var array
         */
        'columns' => [
            'products.name' => 10,
            'categories.title' => 2,
            'categories.name' => 1,
            'attribute_subcategories.description' => 2,
        ],
        'joins' => [
            'categories' => ['products.category_id','categories.id'],
            'attribute_subcategories' => ['products.id','attribute_subcategories.product_id'],

        ],
    ];
    
    public function photos()
    {
        return $this->morphMany('App\Models\Photo',"photoable");
    }
    public function tags()
    {
        return $this->morphToMany(Tag::class,"taggable");
    }
    public function comments()
    {
        return $this->morphToMany(Comment::class,"commentable");
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function attribute_subcategory()
    {
        return $this->hasMany(Attribute_Subcategory::class);
    }
    public function basket()
    {
        return $this->hasMany(Basket::class);
    }
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
    
    // public static function search($data)
    // {
    //     $value = Product::orderBy('id','DESC');
    //     if(sizeof($data) > 0)
    //     {
    //         if(array_key_exists('name',$data))
    //         {
    //             $value = $value->where('name','like','%'.$data['name'].'%');
    //         }
    //     }

    //     $value = $value->paginate(10);
    //     return $value;
    // }
    // public function getRouteKeyName()
    // {
    //     return 'name';
    // }
}
