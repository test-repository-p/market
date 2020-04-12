<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Information;
use App\Models\Logo;
use App\Models\Product;
use App\Models\Slider;

class WeblogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::where('name','like','%home%')->get();
        $banner = Slider::where('name','like','%banner-1%')->get();
        $banner2 = Slider::where('name','like','banner-2')->get();      
        $women = Product::where('category_id','1')->paginate(10);
        $men = Product::where('category_id','3')->paginate(10);
        $art = Article::latest()->paginate(5);


        return view('site.weblog',compact('art','slider','banner','banner2','women','men'));
    

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categorys = Category::get();
        $countsale = Product::orderBy('countsale','desc')->paginate(6);
        $special = Product::where('special','1')->paginate(6);
        $new = Product::orderBy('id','desc')->paginate(6);
        $info = Information::latest()->first();
        $logo = Logo::first();

        $article = Article::find($id);

        $art_cat = Article::where('category_id',$article->category_id)->get();

        return view('site.weblog-detail',compact('art_cat','article','categorys','countsale','special','new','info','logo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
