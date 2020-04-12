<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\Attribute_Subcategory;
use App\Models\Photo;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class AttributevalueController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = Attribute::paginate(1);
        return view('admin.attribute_subcategory.index',compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attributes = Attribute::get();
        $subcategorys = Subcategory::get();
        return view('admin.attribute_subcategory.create',compact('attributes','subcategorys'));
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
            'subcategory_id' => 'required',
            'attribute_id' => 'required',
            // 'description.*' => 'required',
        ]);
        $subcategory_id = $request->get('subcategory_id');
        $attribute_id = $request->get('attribute_id');
        $descriptions = $request->get('description');
        $files = $request->get('image');
        $attribute = Attribute::find($attribute_id);
        if(is_array($descriptions))
        {
            foreach($descriptions as $key => $value){

                $attribute->subcategories()->attach($subcategory_id,['description'=>$value]);
            }
        }
        session()->flash('msg','ذخیره  مقدارویژگی جدید انجام شد');
        return redirect(route('attribute_subcategory.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $att_sub = Attribute_Subcategory::find($id);
        $attributes = Attribute::get();
        $subcategorys = Subcategory::get();
        return view('admin.attribute_subcategory.show',compact('attributes','att_sub','subcategorys'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $att_sub = Attribute_Subcategory::find($id);
        $attributes = Attribute::get();
        $subcategorys = Subcategory::get();
        return view('admin.attribute_subcategory.edite',compact('attributes','subcategorys','att_sub'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate(request(),[
            'description' => 'required',
        ]);
        $att_sub = Attribute_Subcategory::find($id);
        $data = $request->all();    
        $att_sub->update($data);

        session()->flash('msg','تغییرات  ویژگی موردنظر انجام شد');
        return redirect(route('attribute_subcategory.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $att_sub = Attribute_Subcategory::find($id);
        if($att_sub->product_id==null){
            $att_sub->delete();
            session()->flash('msg','  ویژگی موردنظر حذف شد');
        }
        else{
            session()->flash('msg','  ویژگی موردنظر رانمیتوان حذف کردابتدامحصول '.$att_sub->product_id. '  راحذف کنید');

        }
        return redirect()->back();

    }
}
