<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Photo;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = Attribute::paginate(10);
        return view('admin.attribute.index',compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategorys = Subcategory::get();
        return view('admin.attribute.create',compact('subcategorys'));
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
            'email' => 'required',
            'password' => 'required',
            // 'image' => 'required',
        ]);
        $attribute = Attribute::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        $attribute->subcategorys()->sync($request->input('subcategory_id'));
        
        $file = $request['image'];
        $path = 'attributes/';
        $image = $this->ImageUploader($file,$path);
        Photo::create([
            'photoable_id' => $attribute->id,
            'photoable_type' => 'App\Models\attribute',
            'path' => $image,
        ]);
        session()->flash('msg','ذخیره  کاربر انجام شد');
        return redirect(route('attribute.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function show(Attribute $attribute)
    {
        $subcategorys = Subcategory::get();
        return view('admin.attribute.show',compact('attribute','subcategorys'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function edit(Attribute $attribute)
    {
        $subcategorys = Subcategory::get();
        return view('admin.attribute.edite',compact('attribute','subcategorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attribute $attribute)
    {
        $this->validate(request(),[
            'name' => 'required',
            'email' => 'required',
            // 'image' => 'required',
        ]);
        if($request['image'])
        {
            if($attribute->photos()->first())
            {
                unlink($attribute->photos()->first()->path) or die('Delete Error');
                $file = $request['image'];
                $path = 'attributes/';
                $image = $this->ImageUploader($file,$path);
            }
            else
            {
                $file = $request['image'];
                $path = 'attributes/';
                $image = $this->ImageUploader($file,$path);
                Photo::create([
                    'photoable_id' => $attribute->id,
                    'photoable_type' => 'App\attribute',
                    'path' => $image,
                ]);
            }
        }
        else
        {
            $image = $attribute->photos()->first()->path;
        }
        $photo = $attribute->photos()->first();
        $photo->path = $image;
        $photo->save();

        $data = $request->all();    
        $attribute->update($data);
        $attribute->subcategorys()->sync($request->input('subcategory_id'));

        session()->flash('msg','تغییرات  کاربر انجام شد');
        return redirect(route('attribute.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attribute $attribute)
    {
        $photo = $attribute->photos()->first();
        $photo->photoable_id = 0;
        $photo->photoable_type = "";
        unlink($attribute->photos()->first()->path) or die('Delete Error');
        $photo->save();
        $attribute->delete();
        session()->flash('msg','  کاربر موردنظر حذف شد');
        return redirect()->back();
    }
}
