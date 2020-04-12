<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Validator;
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
        $roles = Role::orderBy('id','desc')->paginate(5);
        $permissions = Permission::get();
        return view('admin.role.role',compact('roles','permissions'));
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
            'name' => 'required|string',
            'title' => 'required',
            'permission_id' => 'required',
		]);
       

        $arr = array('msg' => 'خطا!', 'status' => false);      
        if($validator->passes()){ 

            $role = Role::updateOrCreate(
            ['id' => $request->value_id],
            ['name'=>$request->name,'title'=>$request->title]
        );  
        $role->permissions()->sync($request->input('permission_id'));
        $permissions = $role->permissions;
        $arr = array('msg' => 'باموفقیت انجام شد!', 'status' => true);
        return response(["role"=>$role,"arr"=>$arr,'permissions'=>$permissions]);
        }
        return response(["arr"=>$arr,'errors'=>$validator->errors()->all()]);
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
    public function edit($id)
    {
        $where = array('id' => $id);
        $role  = Role::where($where)->first();
        $select[] = $role->permissions()->pluck('id');

        return response()->json(['role'=>$role,'select'=>$select]);
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
       //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::where('id',$id)->delete();
        return response()->json($role);
    }
}
