<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = [
        'name','category_id','title','type','parent_id',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function attributes()
    {
        return $this->belongsToMany(Attribute::class)->withPivot('description','id');
    }
    public function photos()
    {
        return $this->morphMany('App\Models\Photo',"photoable");
    }
    public static function search($data)
    {
        $value = Subcategory::orderBy('id','DESC');
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
