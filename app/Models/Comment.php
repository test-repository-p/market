<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;


class Comment extends Model
{
    use SearchableTrait;
    protected $searchable = [
        /**
         *
         * @var array
         */
        'columns' => [
            'comments.comment' => 6,
            'users.name' => 10,
            'comments.id' => 2,
            'comments.created_at' => 2,


        ],
        'joins' => [
            'users' => ['comments.user_id','users.id'],
        ],
       
    ];
    protected $fillable = [
        'user_id','product_id','comment','article_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function products()
    {
        return $this->morphedByMany(Product::class,"commentable");
    }
    public function articles()
    {
        return $this->morphedByMany(Article::class,"commentable");
    }
   

}
