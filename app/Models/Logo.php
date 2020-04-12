<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;


class Logo extends Model
{
    use SearchableTrait;
    protected $searchable = [
        /**
         *
         * @var array
         */
        'columns' => [
            'logos.id' => 5,
            'logos.name' => 10,
            'logos.title' => 5,


        ],
       
    ];
    protected $fillable = [
        'name','title',
    ];
    public function photos()
    {
        return $this->morphMany('App\Models\Photo',"photoable");
    }
   
}
