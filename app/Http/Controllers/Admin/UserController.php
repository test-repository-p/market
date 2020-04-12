<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Role;
use App\User;
use Validator;
use Illuminate\Http\Request;

class UserController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::orderBy('id','desc')->paginate(5);
        $roles = Role::get();
        return view('admin.user.user',compact('users','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('admin.user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        //     'role_id' =>'required',
        //     'image' =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048',
		// ]);
       

        // if($validator->passes()){ 

        //     $pass = bcrypt($request->password);
        //     $user = User::updateOrCreate(
        //         ['id' => $request->value_id],
        //         ['name'=>$request->name,'email'=>$request->title,'password'=>$pass]
        //         ); 

        //     // 'password' => bcrypt($request['password']),

        //     $u = $user->roles()->sync($request->input('role_id'));
            
        //     $file = $request->file('image');
        //     $path = 'users/';
        //     $image = $this->ImageResize_user($file,$path);
        //     $photo = new Photo;
        //     $photo->path = $image;
        //     $l = $user->photos()->save($photo);

        //     $pic = ['path'=>$image];
            
        //     return response()->json(['success' => 'کاربر جدیدباموفقیت ذخیره شد.','user'=>$user,'pic'=>$pic]);


            
        // }
        // return response(['errors'=>$validator->errors()->all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $roles = Role::get();
        return view('admin.user.show',compact('user','roles'));
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
            $image = $data->photos()->first()->path;
            $pic = ['path'=>$image];
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
        // $this->validate(request(),[
        //     'name' => 'required',
        //     'email' => 'required',
        //     // 'image' => 'required',
        // ]);
        // if($request['image'])
        // {
        //     if($user->photos()->first())
        //     {
        //         unlink($user->photos()->first()->path) or die('Delete Error');
        //         $file = $request['image'];
        //         $path = 'users/';
        //         $image = $this->ImageUploader($file,$path);
        //     }
        //     else
        //     {
        //         $file = $request['image'];
        //         $path = 'users/';
        //         $image = $this->ImageUploader($file,$path);
        //         $photo = new Photo;
        //         $photo->path = $image;
        //         $user->photos()->save($photo);
        //     }
        // }
        // else
        // {
        //     $image = $user->photos()->first()->path;
        // }
        // $photo = $user->photos()->first();
        // $photo->path = $image;
        // $photo->save();

        // $data = $request->all();    
        // $user->update($data);
        // $user->roles()->sync($request->input('role_id'));

        // session()->flash('msg','تغییرات  کاربر انجام شد');
        // return redirect(route('user.index'));


        $validator = Validator::make($request->all(), [
            // 'name' => 'required',
            // 'email' => 'required',
            // 'password' => 'required',
            'role_id' =>'required',
            'image' =>  'image|mimes:jpeg,png,jpg,gif|max:2048',
		]);
       

        if($validator->passes()){ 

//             $form_data = array(
//                 'name'       =>   $request->name,
//                 'email'        =>   $request->email,
// x            );
            $user = User::find($request->hidden_id);
            // $u = $user->update($form_data);
            $u2 = $user->roles()->sync($request->input('role_id'));

       
            $file = $request->file('image');
            if($file != '')
            {   
                $old_photo = $user->photos()->first();
                unlink($old_photo->path);
                $path = 'users/';
                $image = $this->ImageResize_user($file,$path);
                $old_photo->path = $image;
                $old_photo->save();    
                $pic = ['path'=>$image];            
             }
             $old = $user->photos()->first()->path;
             $pic = ['path'=>$old];
               
            return response()->json(['success' => 'کاربر موردنظرباموفقیت ویرایش شد.','user'=>$user,'pic'=>$pic]);

        }
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
        // $photo = $user->photos()->first();
        // $photo->photoable_id = 0;
        // $photo->photoable_type = "";
        // unlink($user->photos()->first()->path) or die('Delete Error');
        // $photo->save();
        
        $l = User::find($id);
        if($l->photos()->first())
        {
            $photo = $l->photos()->first();
            unlink($l->photos()->first()->path) or die('Delete Error');
            $photo->delete();
            
        }

        $user = User::where('id',$id)->delete();
        return response()->json($user);
    }
}
