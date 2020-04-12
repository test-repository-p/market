<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use App\Models\Photo;
use Illuminate\Http\Request;
use Validator;

class LogoController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logos = Logo::orderBy('id','desc')->paginate(5);
        return view('admin.logo.logo',compact('logos'));
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'title' => 'required',
            'image' =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048',
		]);
       

        if($validator->passes()){ 

            $logo = Logo::updateOrCreate(
                ['id' => $request->value_id],
                ['name'=>$request->name,'title'=>$request->title]
                ); 

       

            if($logo->photos()->first())
                {
                    $old_photo = $logo->photos()->first();
                    unlink($old_photo->path) or die('Delete Error');
                    $old_photo->delete();
                }
               
                $file = $request->file('image');
                $path = 'logos/';
                $image = $this->ImageResize_logo($file,$path);
                $photo = new Photo;
                $photo->path = $image;
                $l = $logo->photos()->save($photo);

                $pic = ['path'=>$image];
                
                return response()->json(['success' => 'لوگو جدیدباموفقیت ذخیره شد.','logo'=>$logo,'pic'=>$pic]);


            
        }
        return response(['errors'=>$validator->errors()->all()]);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Logo $logo)
    {
        return view('admin.logo.show',compact('logo'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = Logo::findOrFail($id);
            $image = $data->photos()->first()->path;
            $pic = ['path'=>$image];
            return response()->json(['data' => $data,'pic'=>$pic]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'title' => 'required',
            'image' =>  'image|mimes:jpeg,png,jpg,gif|max:2048',
		]);
       

        if($validator->passes()){ 

            $form_data = array(
                'name'       =>   $request->name,
                'title'        =>   $request->title,
            );
            $logo = Logo::find($request->hidden_id);
            $u = $logo->update($form_data);

       
            $file = $request->file('image');
            if($file != '')
            {   
                $old_photo = $logo->photos()->first();
                unlink($old_photo->path);
                $path = 'logos/';
                $image = $this->ImageResize_logo($file,$path);
                $old_photo->path = $image;
                $old_photo->save();    
                $pic = ['path'=>$image];            
             }
             $old = $logo->photos()->first()->path;
             $pic = ['path'=>$old];
               
            return response()->json(['success' => 'لوگوی موردنظرباموفقیت ویرایش شد.','logo'=>$logo,'pic'=>$pic]);

        }
        return response(['errors'=>$validator->errors()->all()]);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $l = Logo::find($id);
        if($l->photos()->first())
        {
            $photo = $l->photos()->first();
            unlink($l->photos()->first()->path) or die('Delete Error');
            $photo->delete();
            
        }

        $logo = Logo::where('id',$id)->delete();
        return response()->json($logo);

    }
}
