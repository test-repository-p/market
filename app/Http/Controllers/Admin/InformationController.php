<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Information;
use Illuminate\Http\Request;
use Validator;


class InformationController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        $informations = Information::orderBy('id','desc')->paginate(5);
        return view('admin.information.information',compact('informations'));
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
            'state' => 'required',
            'address' => 'required|string',
            'telephone' => 'required|numeric',
            'email' => 'required|email',
		]);
        if($request->input('state') == 1){
            $stat = array('msg' => 'فعال', 'status' => false);
        }
        elseif($request->input('state') == 2){
            $stat = array('msg' => 'غیرفعال', 'status' => false); 
        }

        $arr = array('msg' => 'خطا!', 'status' => false);      
        if($validator->passes()){ 

            $information = Information::updateOrCreate(
            ['id' => $request->value_id],
            ['address'=>$request->address,'state'=>$request->state,'telephone'=>$request->telephone,'email'=>$request->email]
        );     
        $arr = array('msg' => 'باموفقیت انجام شد!', 'status' => true);
        return response(["information"=>$information,"arr"=>$arr,"stat"=>$stat]);
        }
        return response(["arr"=>$arr,'errors'=>$validator->errors()->all()]);
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
    public function edit($id)
    {
        $where = array('id' => $id);
        $information  = Information::where($where)->first();
        return response()->json($information);
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
       //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $information = Information::where('id',$id)->delete();
        return response()->json($information);
    }
}
