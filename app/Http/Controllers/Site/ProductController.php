<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Attribute_Subcategory;
use App\Models\Category;
use App\Models\Information;
use App\Models\Logo;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $element)
    {
        $product = $element;
       
        $sub_id = $product->attribute_subcategory()->first()->subcategory_id;
        $colors = Attribute_Subcategory::where('subcategory_id',$sub_id)->where('product_id','!=',null)
        ->where('attribute_id',4)->get();
        $sizes = Attribute_Subcategory::where('subcategory_id',$sub_id)->where('product_id','!=',null)
        ->where('attribute_id',5)->get();
        $type = Attribute_Subcategory::where('subcategory_id',$sub_id)->where('product_id','!=',null)
        ->where('attribute_id',6)->get();
        $brand = Attribute_Subcategory::where('subcategory_id',$sub_id)->where('product_id','!=',null)
        ->where('attribute_id',7)->get();
        $subs = Attribute_Subcategory::where('subcategory_id',$sub_id)
        ->where('product_id','!=',null)
        ->where('product_id','!=',$product->id)->get();

        $sub_body = Subcategory::where('id',$sub_id)->first();
        
        // foreach ($sizes as  $value) {
        //     echo $value->product->id;
        // }die;

        return view('site.product',compact('product','colors','sizes','type','brand','subs','sub_body'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $element)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $element)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $element)
    {
        //
    }
}
