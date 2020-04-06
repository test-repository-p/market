<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class Article extends Model
{
    use Rateable;
    protected $fillable = [
        'user_id','demo','text','title','category_id',
    ];

    public function photos()
    {
        return $this->morphMany('App\Models\Photo',"photoable");
    }
    public function tags()
    {
        return $this->morphToMany(Tag::class,"taggable");
    }
    public function comments()
    {
        return $this->morphToMany(Comment::class,"commentable");
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
   
    
    public static function search($data)
    {
        $value = Article::orderBy('id','DESC');
        if(sizeof($data) > 0)
        {
            if(array_key_exists('title',$data))
            {
                $value = $value->where('title','like','%'.$data['title'].'%');
            }
        }

        $value = $value->paginate(10);
        return $value;
    }
}
