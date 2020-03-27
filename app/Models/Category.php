<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name','chid',
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
    public static function search($data)
    {
        $category = Category::orderBy('id','DESC');
        if(sizeof($data) > 0)
        {
            if(array_key_exists('name',$data))
            {
                $category = $category->where('name','like','%'.$data['name'].'%');
            }
        }

        $category = $category->paginate(10);
        return $category;
    }
    
}
