<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use App\Models\Photo;
use Illuminate\Http\Request;

class LogoController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $logos = Logo::search($request->all());
        return view('admin.logo.index',compact('logos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.logo.create');
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
            'title' => 'required',
            // 'image' => 'required',
        ]);
        $logo = Logo::create([
            'name' => $request['name'],
            'title' => $request['title'],
        ]);
        
        $file = $request['image'];
        $path = 'logos/';
        $image = $this->ImageResize_logo($file,$path);
        $photo = new Photo;
        $photo->path = $image;
        $logo->photos()->save($photo);

        session()->flash('msg','ذخیره  لوگوجدید انجام شد');
        return redirect(route('logo.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function show(Logo $logo)
    {
        return view('admin.logo.show',compact('logo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function edit(Logo $logo)
    {
        return view('admin.logo.edite',compact('logo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Logo $logo)
    {
        $this->validate(request(),[
            'name' => 'required',
            'title' => 'required',
            // 'image' => 'required',
        ]);
        if($request['image'])
        {
            if($logo->photos()->first())
            {
                unlink($logo->photos()->first()->path) or die('Delete Error');
                $file = $request['image'];
                $path = 'logos/';
                $image = $this->ImageResize_logo($file,$path);
            }
            else
            {
                $file = $request['image'];
                $path = 'logos/';
                $image = $this->ImageResize_logo($file,$path);
                $photo = new Photo;
                $photo->path = $image;
                $logo->photos()->save($photo);
            }
        }
        else
        {
            $image = $logo->photos()->first()->path;
        }
        $photo = $logo->photos()->first();
        $photo->path = $image;
        $photo->save();

        $data = $request->all();    
        $logo->update($data);

        session()->flash('msg','تغییرات  لوگو انجام شد');
        return redirect(route('logo.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Logo $logo)
    {
        if($logo->photos()->first())
        {
            $photo = $logo->photos()->first();
            unlink($logo->photos()->first()->path) or die('Delete Error');
            $photo->delete();
        }
       
        $logo->delete();
        session()->flash('msg','  لوگو موردنظر حذف شد');
        return redirect()->back();
    }
}
