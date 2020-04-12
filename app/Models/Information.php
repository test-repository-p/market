<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;


class Information extends Model
{
    use SearchableTrait;
    protected $searchable = [
        /**
         *
         * @var array
         */
        'columns' => [
            'informations.id' => 4,
            'informations.address' => 6,
            'informations.email' => 8,
            'informations.telephone' => 1,
            'informations.state' => 1,

        ],
       
    ];
    protected $table = "informations";
    protected $fillable = [
        'email','address','telephone','state',
    ];

    
}
