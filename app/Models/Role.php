<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Role extends Model
{
    use SearchableTrait;
    protected $searchable = [
        /**
         *
         * @var array
         */
        'columns' => [
            'roles.id' => 4,
            'roles.name' => 6,
            'roles.title' => 8,
          

        ],
       
       
    ];
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
    
}
