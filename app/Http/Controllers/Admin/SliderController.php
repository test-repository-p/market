<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sliders = Slider::search($request->all());
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // var_dump($request['job']);die;
        $this->validate(request(),[
            'name' => 'required',
            'url' => 'required',
            'image' => 'required',
            // 'text' =>'required',
        ]);



        $slider = Slider::create([
            'name' => $request['name'],
            'url' => $request['url'],
            'text' => $request['text'],
        ]);
        
        $file = $request['image'];
        $path = 'sliders/';
        $image = $this->ImageResize($file,$path);
        $photo = new Photo;
        $photo->path = $image;
        $slider->photos()->save($photo);

        session()->flash('msg','ذخیره اسلایدرجدید انجام شد');
        return redirect(route('slider.index'));
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
    public function edit(Slider $slider)
    {
        return view('admin.slider.edite',compact('slider'));
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
        $this->validate(request(),[
            'name' => 'required',
            'url' => 'required',
            // 'text' =>'required',
            // 'image' => 'required',
        ]);
        if($request['image'])
        {
            if($slider->photos()->first())
            {
                unlink($slider->photos()->first()->path) or die('Delete Error');
                $file = $request['image'];
                $path = 'sliders/';
                $image = $this->ImageResize($file,$path);
            }
            else
            {
                $file = $request['image'];
                $path = 'sliders/';
                $image = $this->ImageResize($file,$path);
                $photo = new Photo;
                $photo->path = $image;
                $slider->photos()->save($photo);
            }
        }
        else
        {
            $image = $slider->photos()->first()->path;
        }
        $photo = $slider->photos()->first();
        $photo->path = $image;
        $photo->save();

        $data = $request->all();    
        $slider->update($data);

        session()->flash('msg','تغییرات  اسلایدر انجام شد');
        return redirect(route('slider.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        if($slider->photos()->first())
        {
            $photo = $slider->photos()->first();
            unlink($slider->photos()->first()->path) or die('Delete Error');
            $photo->delete();
        }
    
        $slider->delete();
        session()->flash('msg',' اسلایدر حذف شد');
        return redirect()->back();
    }
}
