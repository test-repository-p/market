<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'name','url',
    ];
    public function photos()
    {
        return $this->morphMany('App\Models\Photo',"photoable");
    }
    public static function search($data)
    {
        $value = Slider::orderBy('id','DESC');
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
