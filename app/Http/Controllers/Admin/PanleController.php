<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PanleController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        return view('admin.panel.panel',compact('user'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = User::findOrFail($id);
            if($data->photos()->first()){

                $old = $data->photos()->first()->path;
                $pic = ['path'=>$old];
             }else{
                $old = "uploads/users/1585205390.jpg";
                $pic = ['path'=>$old];
             }
            

            // $image = $data->photos()->first()->path;
            // $pic = ['path'=>$image];
            return response()->json(['data' => $data,'pic'=>$pic]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            // 'current_password' => 'required',
            // 'password' => 'nullable|required_with:confirmation|string|confirmed',
            // 'confirm' => 'required',
            'image' =>  'image|mimes:jpeg,png,jpg,gif|max:2048',
		]);
       

        if($validator->passes()){ 

            
            $user = User::find($request->hidden_id);
            // if ( Hash::check($request->current_password, $user->password) ) {
                $form_data = array(
                    'name'       =>   $request->name,
                );
                $u = $user->update($form_data);

                $file = $request->file('image');
            if($file != '')
            {   
                if($user->photos()->first()){

                    $old_photo = $user->photos()->first();
                    unlink($old_photo->path);
                    $path = 'users/';
                    $image = $this->ImageResize_user($file,$path);
                    $old_photo->path = $image;
                    $old_photo->save();    
                    $pic = ['path'=>$image]; 
                }  
                else
                {
                    $file = $request['image'];
                    $path = 'users/';
                    $image = $this->ImageUploader($file,$path);
                    $photo = new Photo();
                    $photo->path = $image;
                    $u = $user->photos()->save($photo);
                    $pic = ['path'=>$image]; 

                }         
             }
             if($user->photos()->first()){

                $old = $user->photos()->first()->path;
                $pic = ['path'=>$old];
             }
             $old = "uploads/users/1585205390.jpg";
             $pic = ['path'=>$old];

            return response()->json(['success' => 'کاربر موردنظرباموفقیت ویرایش شد.','user'=>$user,'pic'=>$pic]);


            }
      

        // }

        return response(['errors'=>$validator->errors()->all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $l = User::find($id);
        if($l->photos()->first())
        {
            $photo = $l->photos()->first();
            unlink($l->photos()->first()->path) or die('Delete Error');
            $photo->delete();
            
        }

        $user = User::where('id',$id);
        return response()->json($user);
    }
}
