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
        $subcategorys = Subcategory::where('parent_id',0)->get();
        return view('admin.subcategory.create',compact('categorys','subcategorys'));
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
            'name.*' => 'required',
            'title.*' => 'required',
            'type.*' => 'required',
            'category_id' => 'required',
            'parent_id' => 'required',
            // 'body' => 'required'

        ]);
        
        $body = $request->get('body');
        $category_id = $request->get('category_id');
        $parent_id = $request->get('parent_id');
        $names = $request->get('name');
        $titles = $request->get('title');
        $types = $request->get('type');
        if(is_array($titles))
        {
            foreach($titles as $key => $value){
                $name = array_key_exists($key,$names) ? $names[$key]:'-';
                $type = array_key_exists($key,$types) ? $types[$key]:1;

                $subcategory = Subcategory::create([
                    'name' => $name,
                    'title' => $value,
                    'type' => $type,
                    'category_id' => $category_id,
                    'parent_id' => $parent_id,
                    'body' => $body,
                ]);
            }
        }

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
        $subcategorys = Subcategory::where('parent_id',0)->get();
        return view('admin.subcategory.edite',compact('subcategory','categorys','subcategorys'));
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
            'title' => 'required',
            'category_id' => 'required',
            // 'parant_id' => 'required',
            'type' => 'required',
            // 'body' => 'required',
        ]);
       

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
        $subcategory->delete();
        session()->flash('msg','  زیرگروه موردنظر حذف شد');
        return redirect()->back();
    }
}
