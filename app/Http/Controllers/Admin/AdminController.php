<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function __construct()
    {
        // auth()->loginUsingId(1);
        $this->middleware('auth');
    }
    //=================search function admin =========
    public function search(Request $request)
    {
        $query = $request->input('query');
        $m = $request->input('model');
        $location = strtolower($m);
        $model = 'App\\Models\\'.$m;
        if($m == 'User'){
            $model = 'App\\'.$m;
        }
        $result = $model::search($query)->latest()->paginate(5);
       
        return view('admin.'.$location.'.search-result',compact('result'));
        
    }

    public function ImageUploader($file,$path)
    {
        $mime = $file->getClientOriginalExtension();
        $filename = time().'.'.$mime;
        $databasename = 'uploads/'.$path;
        $mainpath = public_path($databasename);
        $file->move($mainpath,$filename);
        return $databasename.$filename;  
    }

//=================size slider ==================
    public function ImageResize($file,$path)
    {
        $filename = time().'.'.$file->getClientOriginalExtension();
        $databasename = 'uploads/'.$path;
        $mainpath = public_path($databasename);
        $changesize = $file->move($mainpath,$filename);
        //================= resize ========
        $img = Image::make($changesize->getRealPath());
        $img->resize(848,288);
        //================تغییر ارتفاع متناسب با عرض خودش انحام میده=================
        // $img->resize(200,null,function($constraint){
        //     $constraint->aspectRatio();
        // });

        $img->save($mainpath."resize-".$filename);
        return $databasename."resize-".$filename;
    }

    //=================size logo ==================
    public function ImageResize_logo($file,$path)
    {
        $filename = time().'.'.$file->getClientOriginalExtension();
        $databasename = 'uploads/'.$path;
        $mainpath = public_path($databasename);
        
        // $changesize = $file->move($mainpath,$filename);
        //=================== resize ==============
        $img = Image::make($file->path());
        $img->resize(170,60);
        $img->save($mainpath."logo-".$filename);
        return $databasename."logo-".$filename;
    }


}
