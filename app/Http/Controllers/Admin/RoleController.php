<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::search($request->all());
        $permissions = Permission::get();
        return view('admin.role.index',compact('roles','permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();
        return view('admin.role.create',compact('permissions'));
        
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
        ]);
        $role = Role::create([
            'name' => $request['name'],
            'title' => $request['title'],
        ]);
        $role->permissions()->sync($request->input('permission_id'));
        session()->flash('msg','ذخیره سطح دسترسی جدید انجام شد');
        return redirect(route('role.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('admin.role.show',compact('role'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::get();
        return view('admin.role.edite',compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->validate(request(),[
            'name' => 'required',
            'title' => 'required',
        ]);
        $data = $request->all();    
        $role->update($data);
        $role->permissions()->sync($request->input('permission_id'));

        session()->flash('msg','تغییرات سطح دسترسی انجام شد');
        return redirect(route('role.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        session()->flash('msg',' سطح دسترسی موردنظر حذف شد');
        return redirect()->back();
    }
}
