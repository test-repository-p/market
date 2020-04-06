<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = [
        'name','type_id','value','title',
    ];
    public function subcategories()
    {
        return $this->belongsToMany(Subcategory::class)->withPivot('description','id');
    }
    public function photos()
    {
        return $this->morphMany('App\Models\Photo',"photoable");
    }
    public static function search($data)
    {
        $value = Attribute::orderBy('id','DESC');
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
