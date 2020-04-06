<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $fillable = [
        'email','address','telephone',
    ];

    public static function search($data)
    {
        $value = Information::orderBy('id','DESC');
        if(sizeof($data) > 0)
        {
            if(array_key_exists('email',$data))
            {
                $value = $value->where('email','like','%'.$data['email'].'%');
            }
        }

        $value = $value->paginate(10);
        return $value;
    }
}
