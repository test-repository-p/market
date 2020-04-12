<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Slider;
use Illuminate\Http\Request;
use Validator;


class SliderController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('id','desc')->paginate(5);
        return view('admin.slider.slider',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        // $slider = Slider::create([
        //     'name' => $request['name'],
        //     'url' => $request['url'],
        //     'text' => $request['text'],
        // ]);
        
        // $file = $request['image'];
        // $path = 'sliders/';
        // $image = $this->ImageResize($file,$path);
        // $photo = new Photo;
        // $photo->path = $image;
        // $slider->photos()->save($photo);

        // session()->flash('msg','ذخیره اسلایدرجدید انجام شد');
        // return redirect(route('slider.index'));


        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'url' => 'required',
            'image' => 'required',
            // 'text' =>'required',
            'image' =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048',
		]);
       

        if($validator->passes()){ 

            $slider = Slider::updateOrCreate(
                ['id' => $request->value_id],
                ['name'=>$request->name,'url'=>$request->url,'text'=>$request->text]
                ); 

       

            if($slider->photos()->first())
                {
                    $old_photo = $slider->photos()->first();
                    unlink($old_photo->path) or die('Delete Error');
                    $old_photo->delete();
                }
               
                $file = $request->file('image');
                $path = 'sliders/';
                $image = $this->ImageResize($file,$path);
                $photo = new Photo;
                $photo->path = $image;
                $l = $slider->photos()->save($photo);

                $pic = ['path'=>$image];
                
                return response()->json(['success' => 'اسلایدر جدیدباموفقیت ذخیره شد.','slider'=>$slider,'pic'=>$pic]);


            
        }
        return response(['errors'=>$validator->errors()->all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        return view('admin.slider.show',compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = Slider::findOrFail($id);
            $image = $data->photos()->first()->path;
            $pic = ['path'=>$image];
            return response()->json(['data' => $data,'pic'=>$pic]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
     
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'url' => 'required',
            // 'text' =>'required',
            'image' =>  'image|mimes:jpeg,png,jpg,gif|max:2048',
		]);
       

        if($validator->passes()){ 

            $form_data = array(
                'name'       =>   $request->name,
                'url'        =>   $request->url,
                'text'        =>   $request->text,

            );
            $slider = Slider::find($request->hidden_id);
            $u = $slider->update($form_data);

       
            $file = $request->file('image');
            if($file != '')
            {   
                $old_photo = $slider->photos()->first();
                unlink($old_photo->path);
                $path = 'sliders/';
                $image = $this->ImageResize($file,$path);
                $old_photo->path = $image;
                $old_photo->save();    
                $pic = ['path'=>$image];            
             }
             $old = $slider->photos()->first()->path;
             $pic = ['path'=>$old];
               
            return response()->json(['success' => 'اسلایدر موردنظرباموفقیت ویرایش شد.','slider'=>$slider,'pic'=>$pic]);

        }
        return response(['errors'=>$validator->errors()->all()]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $l = Slider::find($id);
        if($l->photos()->first())
        {
            $photo = $l->photos()->first();
            unlink($l->photos()->first()->path) or die('Delete Error');
            $photo->delete();
            
        }

        $slider = slider::where('id',$id)->delete();
        return response()->json($slider);
    }
}
