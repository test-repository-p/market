<?php

namespace App;

use App\Models\Article;
use App\Models\Basket;
use App\Models\Comment;
use App\Models\Role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Nicolaslopezj\Searchable\SearchableTrait;


class User extends Authenticatable
{
    use SearchableTrait;
    protected $searchable = [
        /**
         *
         * @var array
         */
        'columns' => [
            'users.name' => 10,
            'users.email' => 9,
            'users.id' => 1,
            ],
    ];

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function photos()
    {
        return $this->morphMany('App\Models\Photo',"photoable");
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function basket()
    {
        return $this->hasMany(Basket::class);
    }
    public function article()
    {
        return $this->hasMany(Article::class);
    }
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
    public function hasRole($role)
    {
        if(is_string($role))
        {
            return $this->roles->contains('name',$role);
        }
        foreach($role as $val)
        {
            if($this->hasRole($val->name))
            {
                return true;
            }
        }
        return false;
    }
    
   
}
