<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $subcategorys = Subcategory::search($request->all());
        return view('admin.subcategory.index',compact('subcategorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Category::get();
        return view('admin.subcategory.create',compact('categorys'));
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
            'category_id' => 'required',
            // 'image' => 'image',
        ]);
       $subcategory = Subcategory::create([
            'name' => $request['name'],
            'category_id' => $request['category_id'],
        ]);
        $file = $request['image'];
        $path = 'subcategorys/';
        $image = $this->ImageUploader($file,$path);
        
        $photo = new Photo;
        $photo->path = $image;
        $subcategory->photos()->save($photo);

        session()->flash('msg','ذخیره  زیرگروه جدید انجام شد');
        return redirect(route('subcategory.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        $categorys = Category::get();
        return view('admin.subcategory.show',compact('subcategory','categorys'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
        $categorys = Category::get();
        return view('admin.subcategory.edite',compact('subcategory','categorys'));
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
        $this->validate(request(),[
            'name' => 'required',
            'category_id' => 'required',
            // 'image' => 'image',
        ]);
        if($request['image'])
        {
            unlink($subcategory->photos()->first()->path) or die('Delete Error');
            $file = $request['image'];
            $path = 'subcategorys/';
            $image = $this->ImageUploader($file,$path);
        }
        else
        {
            $image = $subcategory->photos()->first()->path;
        }

        $photo = $subcategory->photos()->first();
        $photo->path = $image;
        $photo->save();

        $data = $request->all();    
        $subcategory->update($data);

        session()->flash('msg','تغییرات  زیرگروه انجام شد');
        return redirect(route('subcategory.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {
        $photo = $subcategory->photos()->first();
        $photo->photoable_id = 0;
        $photo->photoable_type = "";
        unlink($subcategory->photos()->first()->path) or die('Delete Error');
        $photo->save();
        $subcategory->delete();
        session()->flash('msg','  زیرگروه موردنظر حذف شد');
        return redirect()->back();
    }
}
