<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'name','title',
    ];
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public static function search($data)
    {
        $value = Permission::orderBy('id','DESC');
        if(sizeof($data) > 0)
        {
            if(array_key_exists('name',$data) && array_key_exists('title',$data))
            {
                $value = $value->where('name','like','%'.$data['name'].'%')
                ->where('title','like','%'.$data['title'].'%');
            }
        }

        $value = $value->paginate(10);
        return $value;
    }
}
