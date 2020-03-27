<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'user_id','category_id','name','price','status','discount','count','countsale','special',
    ];
    
    public function photos()
    {
        return $this->morphMany('App\Models\Photo',"photoable");
    }
    public function tags()
    {
        return $this->morphToMany(Tag::class,"taggable");
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function attribute_subcategory()
    {
        return $this->hasMany(Attribute_Subcategory::class);
    }
    
    public static function search($data)
    {
        $value = Product::orderBy('id','DESC');
        if(sizeof($data) > 0)
        {
            if(array_key_exists('name',$data))
            {
                $value = $value->where('name','like','%'.$data['name'].'%');
            }
        }

        $value = $value->paginate(10);
        return $value;
    }
}
