<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
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
    public static function search($data)
    {
        $value = Comment::orderBy('id','DESC');
        if(sizeof($data) > 0)
        {
            if(array_key_exists('comment',$data))
            {
                $value = $value->where('comment','like','%'.$data['comment'].'%');
            }
        }

        $value = $value->paginate(10);
        return $value;
    }

}
