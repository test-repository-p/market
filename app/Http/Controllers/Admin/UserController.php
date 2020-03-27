<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Role;
use App\User;
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
        $users = User::search($request->all());
        return view('admin.user.index',compact('users'));
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
        $this->validate(request(),[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            // 'image' => 'required',
        ]);
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        $user->roles()->sync($request->input('role_id'));
        
        $file = $request['image'];
        $path = 'users/';
        $image = $this->ImageUploader($file,$path);
        $photo = new Photo;
        $photo->path = $image;
        $user->photos()->save($photo);

        session()->flash('msg','ذخیره  کاربرجدید انجام شد');
        return redirect(route('user.index'));
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
    public function edit(User $user)
    {
        $roles = Role::get();
        return view('admin.user.edite',compact('user','roles'));
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
        $this->validate(request(),[
            'name' => 'required',
            'email' => 'required',
            // 'image' => 'required',
        ]);
        if($request['image'])
        {
            if($user->photos()->first())
            {
                unlink($user->photos()->first()->path) or die('Delete Error');
                $file = $request['image'];
                $path = 'users/';
                $image = $this->ImageUploader($file,$path);
            }
            else
            {
                $file = $request['image'];
                $path = 'users/';
                $image = $this->ImageUploader($file,$path);
                $photo = new Photo;
                $photo->path = $image;
                $user->photos()->save($photo);
            }
        }
        else
        {
            $image = $user->photos()->first()->path;
        }
        $photo = $user->photos()->first();
        $photo->path = $image;
        $photo->save();

        $data = $request->all();    
        $user->update($data);
        $user->roles()->sync($request->input('role_id'));

        session()->flash('msg','تغییرات  کاربر انجام شد');
        return redirect(route('user.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // $photo = $user->photos()->first();
        // $photo->photoable_id = 0;
        // $photo->photoable_type = "";
        // unlink($user->photos()->first()->path) or die('Delete Error');
        // $photo->save();

        if($user->photos()->first())
        {
            $photo = $user->photos()->first();
            unlink($user->photos()->first()->path) or die('Delete Error');
            $photo->delete();
        }
       
        $user->delete();
        session()->flash('msg','  کاربر موردنظر حذف شد');
        return redirect()->back();
    }
}
