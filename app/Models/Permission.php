<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;


class Permission extends Model
{
    use SearchableTrait;
    protected $searchable = [
        /**
         *
         * @var array
         */
        'columns' => [
            'permissions.id' => 4,
            'permissions.name' => 8,
            'permissions.title' => 8,

        ],
       
    ];
    protected $fillable = [
        'name','title',
    ];
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
   
}
