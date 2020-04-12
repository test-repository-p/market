<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;


class Slider extends Model
{
    use SearchableTrait;
    protected $searchable = [
        /**
         *
         * @var array
         */
        'columns' => [
            'sliders.id' => 4,
            'sliders.name' => 6,
            'sliders.url' => 8,
            'sliders.text' => 2,

        ],
       
    ];
    protected $fillable = [
        'name','url',
    ];
    public function photos()
    {
        return $this->morphMany('App\Models\Photo',"photoable");
    }
    
}
