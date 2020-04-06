<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Information;
use App\Models\Logo;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $cat)
    {
        $category = $cat;
        $banner = Slider::where('name','like','%banner-1%')->get();
        $banner2 = Slider::where('name','like','banner-2')->get();
        $categorys = Category::get();
        $countsale = Product::orderBy('countsale','desc')->paginate(4);
        $special = Product::where('special','1')->paginate(6);
        $new = Product::orderBy('id','desc')->paginate(10);
        $filter = Attribute::get();
        $info = Information::latest()->first();
        $logo = Logo::first();


        $product = Product::paginate(5);
        
        return view('site.category',compact('info','logo','categorys','countsale','special','new','banner','banner2','category','product','filter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
