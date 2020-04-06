<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $informations = Information::search($request->all());
        return view('admin.information.index',compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.information.create');
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
            'address' => 'required',
            'telephone' => 'required',
            'email' => 'required',

        ]);
        $information = Information::create([
            'address' => $request['address'],
            'telephone' => $request['telephone'],
            'email' => $request['email'],

        ]);


        session()->flash('msg','ذخیره   اطلاعات جدید انجام شد');
        return redirect(route('information.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function show(Information $information)
    {
        return view('admin.information.show',compact('information'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function edit(Information $information)
    {
        return view('admin.information.edite',compact('information'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Information $information)
    {
        $this->validate(request(),[
            'address' => 'required',
            'telephone' => 'required',
            'email' => 'required',

        ]);
        $data = $request->all();    
        $information->update($data);

        session()->flash('msg','تغییرات اطلاعات تماس انجام شد');
        return redirect(route('information.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function destroy(Information $information)
    {
        $information->delete();
        session()->flash('msg','   اطلاعات تماس سایت حذف شد');
        return redirect()->back();
    }
}
