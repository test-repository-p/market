<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Validator,Redirect,Response;


class LogoooController extends AdminController
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
        // return view('admin.logo.create');
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
       

        $arr = array('msg' => 'خطا!', 'status' => false);      
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
                $logo->photos()->save($photo);
                


            $arr = array('msg' => 'باموفقیت انجام شد!', 'status' => true);
            return response()->json(["logo"=>$logo,"arr"=>$arr]);
        }
        return response(["arr"=>$arr,'errors'=>$validator->errors()->all()]);
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
    public function edit($id)
    {
        $where = array('id' => $id);
        $logo  = Logo::where($where)->first();
        return response()->json($logo);
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
        // $this->validate(request(),[
        //     'name' => 'required',
        //     'title' => 'required',
        //     // 'image' => 'required',
        // ]);
        // if($request['image'])
        // {
        //     if($logo->photos()->first())
        //     {
        //         unlink($logo->photos()->first()->path) or die('Delete Error');
        //         $file = $request['image'];
        //         $path = 'logos/';
        //         $image = $this->ImageResize_logo($file,$path);
        //     }
        //     else
        //     {
        //         $file = $request['image'];
        //         $path = 'logos/';
        //         $image = $this->ImageResize_logo($file,$path);
        //         $photo = new Photo;
        //         $photo->path = $image;
        //         $logo->photos()->save($photo);
        //     }
        // }
        // else
        // {
        //     $image = $logo->photos()->first()->path;
        // }
        // $photo = $logo->photos()->first();
        // $photo->path = $image;
        // $photo->save();

        // $data = $request->all();    
        // $logo->update($data);

        // session()->flash('msg','تغییرات  لوگو انجام شد');
        // return redirect(route('logo.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Logo  $logo
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
