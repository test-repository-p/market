<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Attribute_Subcategory;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Information;
use App\Models\Logo;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
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
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcat)
    {
        $subcategory = $subcat;
        $banner = Slider::where('name','like','%banner-1%')->get();
        $banner2 = Slider::where('name','like','banner-2')->get();
        $categorys = Category::get();
        $countsale = Product::orderBy('countsale','desc')->paginate(4);
        $special = Product::where('special','1')->paginate(6);
        $new = Product::orderBy('id','desc')->paginate(10);
        $product = Product::paginate(4);
        $filter = Attribute::get();
        $info = Information::latest()->first();
        $logo = Logo::first();

        $att_sub1=null;
        $att_sub=[];
        if($subcategory->parent_id == 0)
        {
            $sub = Subcategory::where('parent_id',$subcategory->id)->get();
            foreach ($sub as  $value) 
            {
              $att_sub[] = Attribute_Subcategory::where('subcategory_id',$value->id)->get();  
            }
        }
        else
        {
             $att_sub1 = Attribute_Subcategory::where('subcategory_id',$subcategory->id)->paginate(6);
            
        }
      
     
        return view('site.subcategory',compact('info','logo','categorys','product','countsale','special','new','banner','banner2','att_sub1','att_sub','filter','subcategory'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {
        //
    }
}
