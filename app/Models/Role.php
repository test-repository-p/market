<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name','title',
    ];
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
    public static function search($data)
    {
        $value = Role::orderBy('id','DESC');
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
