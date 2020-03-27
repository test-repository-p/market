<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Tag;
use Illuminate\Http\Request;

class CategoryController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categorys = Category::search($request->all());
        $tags = Tag::get();
        return view('admin.category.index',compact('categorys','tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::get();
        return view('admin.category.create',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'name' => 'required',
        ]);
        $category = Category::create([
            'name' => $request['name'],
        ]);

        $category->tags()->sync($request->input('tag_id'));

        session()->flash('msg','ذخیره  دسته بندی جدید انجام شد');
        return redirect(route('category.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $tags = Tag::get();
        return view('admin.category.show',compact('category','tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $tags = Tag::get();
        return view('admin.category.edite',compact('category','tags'));
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
        $this->validate(request(),[
            'name' => 'required',
        ]);

        $category->tags()->sync($request->input('tag_id'));
        $data = $request->all();    
        $category->update($data);

        session()->flash('msg','تغییرات  دسته بندی موردنظر انجام شد');
        return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->tags()->first())
        {
            $tag = $category->tags()->first();
            $tag->delete();
        }
        $category->delete();
        session()->flash('msg','  دسته بندی موردنظر حذف شد');
        return redirect()->back();
    }
}
