<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Attribute_Subcategory extends Model
{
    use SearchableTrait;
    protected $searchable = [
        /**
         *
         * @var array
         */
        'columns' => [
            'attributes.name' => 5,
            'attributes.title' => 2,
            'subcategories.title' => 5,
            'subcategories.name' => 3,
            'attribute_subcategories.description' => 5,
        ],
        'joins' => [
            'subcategories' => ['attribute_subcategories.subcategory_id','subcategories.id'],
            'attributes' => ['attribute_subcategories.attribute_id','attributes.id'],

        ],
    ];
    protected $fillable = [
        'product_id','description',
    ];
    protected $table = "attribute_subcategories";
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
   
}
